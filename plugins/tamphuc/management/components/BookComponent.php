<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Validator;
use Input;
use TamPhuc\Management\Models\Book;
use Carbon\Carbon;

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

    public $gg_recapcha_id;

    public function onRun()
    {
        $this->gg_recapcha_id = $this->property('gg_recapcha_id');
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
        $model->subject = post('subject');;
        $model->email = post('email');
        $model->phone = post('phone');
        $model->quatity = post('quatity');
        $model->book_date = Carbon::create(post('book_date'));
        $model->date_type = post('date_type');
        $model->note = post('note');
        $model->save();
    }

    public function defineProperties()
    {
        return [
            'gg_recapcha_id' => [
                'title' => 'gg_recapcha_id',
                'description' => 'Google Recapcha v2 Id',
                'type' => 'string',
            ],
        ];
    }
}
