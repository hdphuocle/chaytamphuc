<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use TamPhuc\Management\Models\Service;

class ServiceComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Service Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $serviceList;

    public function onRun()
    {
//        $this->serviceList = Service::orderBy('position')->get();
        $this->serviceList = Service::all();
    }

    public function defineProperties()
    {
        return [];
    }
}
