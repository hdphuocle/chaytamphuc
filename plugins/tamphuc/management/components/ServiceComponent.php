<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use TamPhuc\Management\Models\Service;

class ServiceComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Service Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $serviceList;

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
        $this->serviceList = Service::orderBy('position')->get();
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
//whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
//whether ip is from remote address
        else
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        echo $ip_address;

        $user_ip = '14.161.40.167';
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
        $country = $geo['geoplugin_countryName'];
        $city = $geo["geoplugin_city"];
        echo $city;
    }

    public function defineProperties()
    {
        return [];
    }
}
