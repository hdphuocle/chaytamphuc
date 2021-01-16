<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use TamPhuc\Management\Models\ImageCategory;


class RestaurantImagesComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'RestaurantImages Component',
            'description' => 'No description provided yet...'
        ];
    }
    public $imageCategory;

    public function onRun()
    {
        $this->imageCategory = ImageCategory::orderBy('position')->get();
    }

    public function defineProperties()
    {
        return [];
    }
}
