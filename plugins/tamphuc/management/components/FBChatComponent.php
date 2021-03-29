<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;

class FBChatComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'FBChat Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $fb_page_id = '106524191123178';

    function getUserIP()
    {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }

    public function onRun()
    {
        $local = $this->property('location');
        $this->fb_page_id = '106524191123178';
        if (strcmp($local, 'hanoi') == 0) {
            $this->fb_page_id = '106524191123178';
        } elseif (strcmp($local, 'hcm') == 0) {
            $this->fb_page_id = '106524191123178';
        } elseif (strcmp($local, 'danang') == 0) {
            $this->fb_page_id = '2118731971519169';
        } else {
            $ip_address = $this->getUserIP();
            $geo = unserialize(file_get_contents("http://ip-api.com/php/$ip_address"));
            if ($geo["status"] === 'success') {
                $city = $geo["regionName"];
                $location = DB::table('tamphuc_management_location')->where('slug', 'LIKE', $city)->first();
                if ($location) {
                    if ($location->id == 3) {
                        $this->fb_page_id = '2118731971519169';
                    } else {
                        $this->fb_page_id = '106524191123178';
                    }
                } else {
                    $cityArray = ['Hai Lang', 'Huế', 'Dong Ha', 'Tinh Quang Tri', 'Tam Ky', 'Tinh Quang Nam'];
                    if (in_array($city, $cityArray)) {
                        $this->fb_page_id = '2118731971519169';
                    }
                }
            }

        }
    }

    public function defineProperties()
    {
        return [
            'location' => [
                'title' => 'location',
                'description' => 'Location',
                'type' => 'string',
            ]
        ];
    }
}
