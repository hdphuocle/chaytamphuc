<?php namespace PhuocLe\BlogComments;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public $require = ['RainLab.Blog', 'RainLab.User'];


    public function pluginDetails()
    {
        return [
            'name'        => 'phuocle.blogcomments::lang.plugin.name',
            'description' => 'phuocle.blogcomments::lang.plugin.description',
            'author'      => 'PhuocLe',
            'icon'        => 'icon-paper'
        ];
    }

    public function registerComponents()
    {
        return [
            'PhuocLe\BlogComments\Components\Comments' => 'comments',
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'Comments',
                'icon'        => 'icon-comments-o',
                'description' => 'Manage Settings.',
                'class'       => 'PhuocLe\BlogComments\Models\Settings',
                'order'       => 60
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'phuocle.blogcomments.manage_comments' => [
                'tab'   => 'phuocle.blogcomments::lang.permissions.comments_tab',
                'label' => 'phuocle.blogcomments::lang.permissions.comments_label'
            ]
        ];
    }

}
