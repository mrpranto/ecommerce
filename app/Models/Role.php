<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = [];


    public function admins(){

        return $this->hasMany(Admin::class);

    }



}
