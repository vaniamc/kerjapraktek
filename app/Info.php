<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use SoftDeletes;

    protected $table = 'info';
    protected $primaryKey = 'info_id';
    public $incrementing = true;
    protected $fillable = ['info_title','info_poster'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
