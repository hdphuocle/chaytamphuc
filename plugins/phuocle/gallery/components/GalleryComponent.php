<?php namespace PhuocLe\Gallery\Components;

use Cms\Classes\ComponentBase;
use PhuocLe\Gallery\Models\Gallery;

class GalleryComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Gallery Component',
            'description' => 'Gallery show images with the dynamic dimension'
        ];
    }

    public $gallery;

    public function onRun()
    {
        $this->addJs('https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=');
        $this->addJs('/plugins/phuocle/gallery/assets/gallery.js', ['defer' => true]);
        $this->addCss('/plugins/phuocle/gallery/assets/gallery.css');
        $this->gallery = Gallery::orderBy('position')->get();
    }

    public function defineProperties()
    {
        return [];
    }
}
