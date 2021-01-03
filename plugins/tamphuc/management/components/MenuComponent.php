<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;
use TamPhuc\Management\Models\Location;

class MenuComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Menu Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $menuList;
    public $typeList;

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
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        echo $ip_address;


        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
        $country = $geo['geoplugin_countryName'];
        $city = $geo["geoplugin_city"];
        echo $city;
        if ($city) {
            $location = Db::select("select * from tamphuc_management_location where LIKE '%$city%'", [1]);
            echo $location;
        }

        $this->menuList = Menu::all();

        $this->typeList = Type::orderBy('position')->get();

        $this->menuList = $this->menuList->map(function ($menu) {
            $type = Type::where('id', $menu->type_id)->first();
            $menu->slugType = $type->slug;
            return $menu;
        });
    }

    public function defineProperties()
    {
        return [];
    }
}
