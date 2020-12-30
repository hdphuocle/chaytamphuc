<?php namespace TamPhuc\Management\Models;

use Model;

/**
 * Model
 */
class CookBlog extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'tamphuc_management_cook_blog';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
