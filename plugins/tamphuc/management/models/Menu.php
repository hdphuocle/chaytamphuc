<?php namespace TamPhuc\Management\Models;

use Model;

/**
 * Model
 */
class Menu extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'tamphuc_management_menu';
    public $belongsTo = [
        'location' => 'TamPhuc\Management\Models\Location',
        'type' => 'TamPhuc\Management\Models\Type'
    ];

    public function slugType()
    {
        return $this->hasOne('TamPhuc\Management\Models\Type');
    }

    private $slug;

    public function getNameAttribute($value)
    {
        $this->slug = $value;
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function getSlugAttribute()
    {
        return $this->attributes['slug'] = str_slug($this->slug);
    }

    public $attachOne = [
        'imageUrl' => ['System\Models\File', 'public' => true]
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
