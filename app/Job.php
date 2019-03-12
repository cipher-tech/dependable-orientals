<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = ['id'];

    public function categories(){
        return $this->belongsToMany('App\Category', 'category_job')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User', "job_user")->withTimestamps();
    }
}
