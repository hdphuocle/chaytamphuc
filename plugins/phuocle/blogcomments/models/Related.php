<?php namespace PhuocLe\Related\Models;

use Model;

/**
 * Related Model
 */
class Related extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'phuocle_related_relateds';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}
