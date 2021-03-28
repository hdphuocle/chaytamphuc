<?php namespace PhuocLe\Gallery;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'PhuocLe\Gallery\Components\GalleryComponent' => 'gallery',
        ];
    }

    public function registerSettings()
    {
    }
}
