<?php namespace TamPhuc\Management;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'TamPhuc\Management\Components\MenuComponent' => 'menuList',
            'TamPhuc\Management\Components\ServiceComponent' => 'serviceList'
        ];
    }

    public function registerSettings()
    {
    }
}
