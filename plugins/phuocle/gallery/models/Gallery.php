<?php namespace PhuocLe\Gallery\Models;

use Model;

/**
 * Model
 */
class Gallery extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'phuocle_gallery_images';

    /**
     * @var array Validation rules
     */

    public $attachOne = [
        'imageUrl' => ['System\Models\File', 'public' => true]
    ];

    public $rules = [
    ];
}
