<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $table = 'album';
    protected $primaryKey = 'album_id';
    public $incrementing = true;
    protected $fillable = ['album_name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function gallery()
    {
    	return $this->hasMany('App\Gallery','album_id');
    }
}
