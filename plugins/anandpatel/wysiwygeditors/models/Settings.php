<?php namespace AnandPatel\WysiwygEditors\models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'backend_settings';

    public $settingsFields = 'fields.yaml';

    protected $cache = [];
}
