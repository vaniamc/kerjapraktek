<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';
    protected $primaryKey = 'category_id';
    public $incrementing = true;
    protected $fillable = ['category_name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function blog()
    {
    	return $this->hasMany('App\Blog');
    }
}
