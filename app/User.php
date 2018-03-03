<?php

namespace App;

use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Billable;

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

    public function servers(){
      return $this->hasMany('App\Server');
    }

    public function domains(){
      return $this->hasMany('App\Domain');
    }

    public function emails(){
      return $this->hasMany('App\Email');
    }

    public function keys(){
      return $this->hasMany('App\Key');
    }

    public function certs(){
      return $this->hasMany('App\Cert');
    }
}
