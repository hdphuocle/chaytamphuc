<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Validator;
use Input;
use TamPhuc\Management\Models\Book;

class BookComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Book Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function init()
    {
        $this->addCss('/plugins/tamphuc/management/assets/css/book.css');
    }

    public function onBookSubmit()
    {
        $validate = Validator::make(
            [
                'name' => input('name'),
                'email' => input('email'),
                'phone' => input('phone'),
            ],
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]
        );
        $model = new Book();
        $model->name = post('name');
        $model->email = post('email');
        $model->phone = post('phone');
        $model->subject = post('subject');
        $model->content = post('note');
        $model->save();
    }

    public function defineProperties()
    {
        return [];
    }
}
