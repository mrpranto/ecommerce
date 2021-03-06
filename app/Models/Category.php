<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category){

            $category->slug = str_slug($category->category_name);

        });
    }

    public function sub_categories(){

        return $this->hasMany(SubCategory::class);

    }

    public function sub_sub_categories(){

        return $this->hasMany(Sub_sub_Category::class);

    }

    public function products(){

        return $this->hasMany(Product::class);

    }

}
