<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;

class DanangMenuComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'DanangMenu Component',
            'description' => 'No description provided yet...'
        ];
    }
    public $danangMenuList;
    public $typeList;
    public $location_name = 'Đà Nẵng';

    public function onRun()
    {

        $this->danangMenuList = Menu::where('location_id', 3)->get();

        $this->typeList = Type::orderBy('position')->get();

        $this->danangMenuList = $this->danangMenuList->map(function ($menu) {
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
