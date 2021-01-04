<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;

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

//        $ip_address = $this->getUserIP();
        $ip_address = "116.97.55.126";
//        echo $ip_address;
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
        $city = $geo["geoplugin_city"];
//        echo $city;
        $location_id = 1;
        if ($city) {
            $location = DB::table('tamphuc_management_location')->where('slug', 'LIKE', $city)->first();
            if ($location) {
                $location_id = $location->id;
                $this->location_name = $location->name;
            }
        }

        $this->menuList = Menu::where('location_id', $location_id)->get();

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
