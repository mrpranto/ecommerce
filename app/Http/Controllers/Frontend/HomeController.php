<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){

        $data = [];
        $data['products']   = Product::with('category','product_images')->where('active',1)->orderBy('id','desc')->take(10)->get();

        return view('frontend.home',$data);

    }
    public function category(){

        return view('frontend.category');

    }
    public function product_details(){

        return view('frontend.product-details');

    }

}
