<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verified','email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orders(){
        return $this ->hasMany('App\Order');
    }

    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }
}
