<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sub_category){

            $sub_category->slug = str_slug($sub_category->sub_category_name);

        });
    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function sub_sub_categories(){

        return $this->hasMany(Sub_sub_Category::class);

    }

    public function products(){

        return $this->hasMany(Product::class);

    }

}
