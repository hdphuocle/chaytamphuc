<?php namespace Tamphuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;
use function Aws\map;

class MenuListComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'MenuList Component',
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
        $local = $this->property('location');
        $limitSize = $this->property('limit');
        $location_id = 1;
        if (strcmp($local, 'hanoi') == 0) {
            $location_id = 1;
            $this->location_name = 'Hà Nội';
        } elseif (strcmp($local, 'hcm') == 0) {
            $location_id = 1;
            $this->location_name = 'TP. Hồ Chí Minh';
        } elseif (strcmp($local, 'danang') == 0) {
            $location_id = 3;
            $this->location_name = 'Đà Nẵng';
        } else {
            $ip_address = $this->getUserIP();
            $geo = unserialize(file_get_contents("http://ip-api.com/php/$ip_address"));
            if ($geo["status"] === 'success') {
                $city = $geo["regionName"];
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

        $this->menuList = Menu::where('location_id', $location_id)->get();
        $type_arr = array();
        foreach ($this->menuList as $item) {
            $type_arr[] = $item->type_id;
        }
        $type_arr = array_unique($type_arr);
        $this->typeList = Type::whereIn('id', $type_arr)->get();
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
