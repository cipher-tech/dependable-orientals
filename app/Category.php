<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function jobs(){
        return $this->belongsToMany('App\Job', 'category_job')->withTimestamps();
    }
}
