<?php namespace TamPhuc\Management\Models;

use Model;

/**
 * Model
 */
class Hotline extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'tamphuc_management_hotline';

    public $belongsTo = [
        'location' => 'TamPhuc\Management\Models\Location'
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
