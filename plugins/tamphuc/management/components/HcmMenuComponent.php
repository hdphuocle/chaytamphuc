<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;

class HcmMenuComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HcmMenu Component',
            'description' => 'No description provided yet...'
        ];
    }
    public $HcmMenuList;
    public $typeList;
    public $location_name = 'TP. Hồ Chí Minh';

    public function onRun()
    {

        $this->HcmMenuList = Menu::where('location_id', 2)->get();

        $this->typeList = Type::orderBy('position')->get();

        $this->HcmMenuList = $this->HcmMenuList->map(function ($menu) {
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
