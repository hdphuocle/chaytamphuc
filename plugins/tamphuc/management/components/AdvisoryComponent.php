<?php namespace TamPhuc\Management\Components;

use Cms\Classes\ComponentBase;
use Validator;
use Input;
use TamPhuc\Management\Models\Advisory;

class AdvisoryComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Advisory Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function init()
    {
        $this->addCss('/plugins/tamphuc/management/assets/css/advisory.css');
    }

    public function onAdvisorySubmit()
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
        $model = new Advisory();
        $model->name = post('name');
        $model->email = post('email');
        $model->phone = post('phone');
        $model->subject = post('subject');
        $model->content = post('content');
        $model->save();
    }

    public $gg_recapcha_id;

    public function onRun()
    {
        $this->gg_recapcha_id = $this->property('gg_recapcha_id');
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
