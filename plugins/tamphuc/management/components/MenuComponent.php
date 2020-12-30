<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
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

    public function onRun()
    {
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
