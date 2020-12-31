<?php namespace TamPhuc\Management\Models;

use Model;

/**
 * Model
 */
class Slide extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'tamphuc_management_slide';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
