<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    public $incrementing = true;
    protected $fillable = ['blog_title','blog_content','blog_picture', 'blog_publish'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
