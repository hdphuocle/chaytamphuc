<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Hotline;

class HotlineComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'HotlineComponent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $hotline;
    public $location_name = 'Hà Nội';

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
        $location_id = 1;
        if (strcmp($local, 'hanoi') == 0) {
            $location_id = 1;
            $this->location_name = 'Hà Nội';
        } elseif (strcmp($local, 'hcm') == 0) {
            $location_id = 2;
            $this->location_name = 'TP. Hồ Chí Minh';
        } elseif (strcmp($local, 'danang') == 0) {
            $location_id = 3;
            $this->location_name = 'Đà Nẵng';
        } else {
            $ip_address = $this->getUserIP();
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
            $city = $geo["geoplugin_city"];
            if ($city) {
                $location = DB::table('tamphuc_management_location')->where('slug', 'LIKE', $city)->first();
                if ($location) {
                    $location_id = $location->id;
                    $this->location_name = $location->name;
                } else {
                    $cityArray = ['Hai Lang', 'Huế', 'Dong Ha', 'Quang Tri', 'Tam Ky', 'Quang Nam'];
                    if (in_array($city, $cityArray)) {
                        $location_id = 3;
                        $this->location_name = 'Đà Nẵng';
                    }
                }
            }
        }
        $this->hotline = Hotline::where('location_id', $location_id)->first();
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
