<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_sub_Category extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sub_sub_category){

            $sub_sub_category->slug = str_slug($sub_sub_category->sub_sub_category_name);

        });
    }

    public function sub_category(){

        return $this->belongsTo(SubCategory::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function products(){

        return $this->hasMany(Product::class);

    }

}
