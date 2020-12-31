<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use TamPhuc\Management\Models\Slide;

class SlideComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Slide Component',
            'description' => 'No description provided yet...'
        ];
    }

    public $slideList;

    public function onRun()
    {
        $this->slideList = Slide::orderBy('position')->get();
    }

    public function defineProperties()
    {
        return [];
    }
}
