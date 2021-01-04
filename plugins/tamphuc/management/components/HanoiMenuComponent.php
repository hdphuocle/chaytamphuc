<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use TamPhuc\Management\Models\Menu;
use TamPhuc\Management\Models\Type;

class HanoiMenuComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HanoiMenu Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $hanoiMenuList;
    public $typeList;
    public $location_name = 'Hà Nội';

    public function onRun()
    {

        $this->hanoiMenuList = Menu::where('location_id', 1)->get();

        $this->typeList = Type::orderBy('position')->get();

        $this->hanoiMenuList = $this->hanoiMenuList->map(function ($menu) {
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
