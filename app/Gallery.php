<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $table = 'gallery';
    protected $primaryKey = 'gallery_id';
    public $incrementing = true;
    protected $fillable = ['gallery_path'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function hasAlbum()
    {
    	return $this->belongsTo('App\Album','album_id','album_id');
    }
}
