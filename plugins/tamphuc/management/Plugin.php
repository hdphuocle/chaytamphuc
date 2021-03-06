<?php namespace TamPhuc\Management;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'TamPhuc\Management\Components\MenuComponent' => 'menuList',
            'TamPhuc\Management\Components\MenuListComponent' => 'allMenu',
            'TamPhuc\Management\Components\DanangMenuComponent' => 'danangMenuList',
            'TamPhuc\Management\Components\HanoiMenuComponent' => 'hanoiMenuList',
            'TamPhuc\Management\Components\ServiceComponent' => 'serviceList',
            'TamPhuc\Management\Components\SlideComponent' => 'slideList',
            'TamPhuc\Management\Components\RestaurantImagesComponent' => 'restaurantImagesList',
            'TamPhuc\Management\Components\AdvisoryComponent' => 'advisoryForm',
            'TamPhuc\Management\Components\BookComponent' => 'bookForm',
            'TamPhuc\Management\Components\HotlineComponent' => 'hotline',
            'TamPhuc\Management\Components\NavbarComponent' => 'navbar',
            'TamPhuc\Management\Components\FBChatComponent' => 'fBChat'
        ];
    }

    public function registerSettings()
    {
    }
}
