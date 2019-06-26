<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product){

            $product->slug = str_slug($product->product_name);

        });
    }


    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function sub_category(){

        return $this->belongsTo(SubCategory::class);

    }


    public function sub_sub_category(){

        return $this->belongsTo(Sub_sub_Category::class,'sub_sub__category_id');

    }

    public function product_images(){

        return $this->hasMany(ProductImage::class);

    }

}