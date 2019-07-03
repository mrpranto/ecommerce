<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Sub_sub_Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Input;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['subcategories'] = SubCategory::orderBy('id','desc')->get();
        $data['sub_sub_categories'] = Sub_sub_Category::orderBy('id','desc')->get();
        $data['brands'] = Brand::orderBy('id','desc')->get();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();

       return view('backend.product.create',$data);
    }

 /**
     * get Sub Categories by Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getSubCategory(){
        $id = Input::get('id');
    
        $sub_category = SubCategory::where('category_id',$id)->get();
        echo '<option value="">' . '- Select Sub Category -' . '</option>';
        foreach ($sub_category as $value) {
            echo '<option value="' . $value->id . '">' . $value->sub_category_name . '</option>';
        }
    }

    public function getSub_subCategory(){
        $id = Input::get('id');
        $sub_sub_category = Sub_sub_Category::where('sub_category_id',$id)->get();
        echo '<option value="">' . '- Select Sub Sub-Category -' . '</option>';
        foreach ($sub_sub_category as $value) {
            echo '<option value="' . $value->id . '">' . $value->sub_sub_category_name . '</option>';
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'ok';

        exit();
        $this->validate($request,[
            'product_name' => 'required|max:255|unique:products,product_name',
            'category_id'  => 'required',
            'sub_category_id'  => 'required',
            'sub_sub_category_id'  => 'required',
            'brand_id'  => 'required',
            'sku'  => 'required|unique:products,sku',
            'color'  => 'required',
            'size'  => 'required',
            'price'  => 'required|numeric',
            'new_price'  => 'numeric',
            'product_image'  => 'required|image|max:1024',
            
        ],[

            'category_id.required' => 'Categpory field is required',
            'sub_category_id.required' => 'Sub Categpory field is required',
            'sub_sub_category_id.required' => 'Sub Sub-Categpory field is required',
            'brand_id.required' => 'Sub Sub-Categpory field is required',

        ]);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
