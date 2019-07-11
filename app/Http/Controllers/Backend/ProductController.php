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
use App\Models\Product;
use Carbon\Carbon;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category','sub_category','sub_sub_category','color','brand','product_images')->orderBy('id','desc')->get();
        return view('backend.product.index',compact('products'));
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
       

        $this->validate($request,[
            'product_name' => 'required|max:255|unique:products,product_name',
            'category_id'  => 'required',
            'sub_category_id'  => 'required',
            'sub_sub_category_id'  => 'required',
            'brand_id'  => 'required',
            'sku'  => 'required|unique:products,sku',
            'color_id'  => 'required',
            'size'  => 'required',
            'price'  => 'required|numeric',
            'new_price'  => 'numeric',
            'product_image'  => 'required|max:1024',
            
        ],[

            'category_id.required' => 'Categpory field is required',
            'sub_category_id.required' => 'Sub Categpory field is required',
            'sub_sub_category_id.required' => 'Sub Sub-Categpory field is required',
            'brand_id.required' => 'Sub Sub-Categpory field is required',

        ]);

        $slug =str_slug($request->product_name);

        $data = [

            'product_name' => $request->product_name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub__category_id' => $request->sub_sub_category_id,
            'brand_id' => $request->brand_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'tags' => $request->tags,
            'sku' => $request->sku,
            'color_id' => $request->color_id,
            'size' => $request->size,
            'price' => $request->price,
            'new_price' => $request->new_price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ];

        $product_insert_id = Product::insertGetId($data);


      

            if ($request->product_image){
                
                $file = [];

                foreach ($request->product_image as $key => $value) {
                    
            

                $image = $request->file('product_image')[$key];
        

                if (isset($image)) {

                    $currentDate = Carbon::now()->toDateString();
                    $imageName = $slug . '_' . $currentDate . '_' . uniqid() . '.' . $image->getClientOriginalExtension();


                    if (!Storage::disk('public')->exists('product')) {
                        Storage::disk('public')->makeDirectory('product');
                    }
        
                    $product_image = Image::make($image)->resize(370,370)->stream();
                    Storage::disk('public')->put('product/'.$imageName,$product_image);
                 

                }else{

                    $imageName = 'default.png';
        
                }


                $file[] = [

                    'product_id' =>$product_insert_id,
                    'product_image' => $imageName,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ];

                }


                $product_image = new ProductImage();
                $product_image::insert($file);

            }




          


        return redirect()->back()->with('massage','Product Added Succesful !');



    }


    // Product Published Method

    public function published($id){

        $product = Product::find($id);
        $product->active = 1;
        $product->save();

        return redirect()->back()->with('massage','Product Published Successfull !');
        

    }


    // Product unpublished Method

    public function unpublished($id){

        $product = Product::find($id);
        $product->active = 0;
        $product->save();

        return redirect()->back()->with('massage','Product Un-Published Successfull !');


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
        
        
        $data = [];
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['subcategories'] = SubCategory::orderBy('id','desc')->get();
        $data['sub_sub_categories'] = Sub_sub_Category::orderBy('id','desc')->get();
        $data['brands'] = Brand::orderBy('id','desc')->get();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['product'] = Product::find($id);

        if(!isset($data['product']->id)){
            return redirect()->route('product.index');
        }

        return view('backend.product.edit',$data);

    }



    // Delete Product Image

    public function delete_product_image($id)
    {
        
        $product_image = ProductImage::find($id);

        if (Storage::disk('public')->exists('product/'.$product_image->product_image)) {
            Storage::disk('public')->delete('product/'.$product_image->product_image);
        }

        $product_image->delete();

        return redirect()->back()->with('massage','Image Delete Successful .');

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
        
        $product = Product::find($id);
       
        foreach ($product->product_images as $image) {
           
            
            if (Storage::disk('public')->exists('product/'.$image->product_image)) {
                Storage::disk('public')->delete('product/'.$image->product_image);
            }

        }
        
        ProductImage::where('product_id',$id)->delete();
        $product->delete();

        return redirect()->back()->with('massage','Product Delete Successful .');
         

    }
}
