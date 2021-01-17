<?php namespace TamPhuc\Management\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Book extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'    ];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('TamPhuc.Management', 'book-and-advisory', 'side-service-book');
    }
}
