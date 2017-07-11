<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    public $incrementing = true;
    protected $fillable = ['blog_title','blog_content','blog_picture', 'blog_publish'];
}
