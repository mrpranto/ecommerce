<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    use Notifiable;


    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];



    public function role(){

        return $this->belongsTo(Role::class);

    }

}
