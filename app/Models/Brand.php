<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($brand){

            $brand->slug = str_slug($brand->brand_name);

        });
    }

    public function products(){

        return $this->hasMany(Product::class);

    }

}
