<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


//my add
//use Yarob\LaravelExpirable\Expirable;


class User extends Authenticatable
{
    use Notifiable;

    //my add
    //use Expirable;

    //my add
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    /*protected $dates = [
        'expire_at'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
