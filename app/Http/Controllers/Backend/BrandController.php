<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.brand.index',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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

            'brand_name' => 'required|unique:brands,brand_name|max:70',
            'brand_logo' => 'required|image|max:1024',

        ]);

        $image = $request->file('brand_logo');
        $slug  = str_slug($request->brand_name);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = str_slug($request->brand_name).'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('brand')) {
                Storage::disk('public')->makeDirectory('brand');
            }

            $brand_image = Image::make($image)->resize(170,93)->save( $imageName,90);
            Storage::disk('public')->put('brand/'.$imageName,$brand_image);



        }else{

            $imageName = 'default.png';

        }


        $brand = Brand::insert([

            'brand_name'      => $request->brand_name,
            'slug'            => $slug,
            'brand_logo'      => $imageName,
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

        ]);


       if ($brand) {
        
        return redirect()->route('brand.create')->with('massage','Brand Create Successfull !');

       } else {
        
        return redirect()->route('brand.create')->with('error','Somte thing is wrong !');
        
       }
       


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
        
        $brand = Brand::find($id);

        if(!isset($brand->id)){
            return redirect()->route('brand.index');
        }


        return view('backend.brand.edit',compact('brand'));

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
        
        $this->validate($request,[

            'brand_name' => 'required|unique:brands,brand_name,'.$id.'|max:70',
            'brand_logo' => 'image|max:1024',

        ]);

        $image = $request->file('brand_logo');
        $slug  = str_slug($request->brand_name);
        $brand = Brand::find($id);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('brand')) {
                Storage::disk('public')->makeDirectory('brand');
            }

            if (Storage::disk('public')->exists('brand/'.$brand->brand_logo)) {
                Storage::disk('public')->delete('brand/'.$brand->brand_logo);
            }

            $brand_image = Image::make($image)->resize(170,93)->save( $imageName,90);
            Storage::disk('public')->put('brand/'.$imageName,$brand_image);



        }else{

            $imageName = $brand->brand_logo;

        }


        $brand->brand_name = $request->brand_name;
        $brand->slug = $slug;
        $brand->brand_logo = $imageName;
        $brand->updated_at = Carbon::now();
        $brand->save();


        
        return redirect()->route('brand.index')->with('massage','Brand Update Successfull !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (Storage::disk('public')->exists('brand/'.$brand->brand_logo)) {
            Storage::disk('public')->delete('brand/'.$brand->brand_logo);
        }

        $brand->delete();

        return redirect()->route('brand.index')->with('massage','Brand Deleted Successfull !');


    }
}
