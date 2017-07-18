<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'schedule_id';
    public $incrementing = true;
    protected $fillable = ['schedule_title','schedule_link'];
}
