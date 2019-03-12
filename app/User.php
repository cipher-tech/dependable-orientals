<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable; 
    use HasRoles;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'phone_number', 'password', 'sex', 'address', 'file'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs(){
        return $this->belongsToMany("App\Job", "job_user")->withTimestamps();
    }

    public function comments(){
        return $this->hasMany('App\comment');
    }

    public function saveRoles($roles){
        if(!empty($roles)){
            $this->roles()->sync($roles);
        }else{
            $this->roles()->detach();
        }
    }
}
