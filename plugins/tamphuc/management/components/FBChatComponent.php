<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;

class FBChatComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FBChat Component',
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
        $fb_page_id = '106524191123178';
        if (strcmp($local, 'hanoi') == 0) {
            $fb_page_id = '106524191123178';
        } elseif (strcmp($local, 'hcm') == 0) {
            $fb_page_id = '106524191123178';
        } elseif (strcmp($local, 'danang') == 0) {
            $fb_page_id = '106524191123178';
        } else {
            $ip_address = $this->getUserIP();
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
            $city = $geo["geoplugin_region"];
            if ($city) {
                $location = DB::table('tamphuc_management_location')->where('slug', 'LIKE', $city)->first();
                if ($location) {
                    $location_id = $location->id;
                    $fb_page_id = '106524191123178';
                } else {
                    $cityArray = ['Hai Lang', 'Huế', 'Dong Ha', 'Quang Tri', 'Tam Ky', 'Quang Nam'];
                    if (in_array($city, $cityArray)) {
                        $fb_page_id = '106524191123178';
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