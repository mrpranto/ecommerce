<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('backend.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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

            'category_name' => 'required|unique:categories,category_name|max:100',
            'category_banner' => 'required|image|max:1024',

        ]);

        $image = $request->file('category_banner');
        $slug  = str_slug($request->category_name);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = str_slug($request->category_name).'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }

            $category_image = Image::make($image)->resize(870,320)->stream();
            Storage::disk('public')->put('category/'.$imageName,$category_image);


            if (!Storage::disk('public')->exists('category/banner/')) {
                Storage::disk('public')->makeDirectory('category/banner/');
            }

            $banner = Image::make($image)->resize(208,158)->stream();
            Storage::disk('public')->put('category/banner/'.$imageName,$banner);


        }else{

            $imageName = 'default.png';

        }


        $category = Category::insert([

            'category_name'   => $request->category_name,
            'slug'            => $slug,
            'category_banner' => $imageName,
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

        ]);


       if ($category) {
        
        return redirect()->route('category.create')->with('massage','Category Create Successfull !');

       } else {
        
        return redirect()->route('category.create')->with('error','Somte thing is wrong !');
        
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
        $category = Category::find($id);

        if(!isset($category->id)){
            return redirect()->route('category.index');
        }


        return view('backend.category.edit',compact('category'));
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

            'category_name' => 'unique:categories,category_name,'.$id.'|max:100',
            'category_banner' => 'image|max:1024',

        ]);

        $image = $request->file('category_banner');
        $slug  = str_slug($request->category_name);
        $category = Category::find($id);


        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = str_slug($request->category_name).'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }

            if (Storage::disk('public')->exists('category/'.$category->category_banner)) {

                Storage::disk('public')->delete('category/'.$category->category_banner);

            }

            $category_image = Image::make($image)->resize(870,320)->stream();
            Storage::disk('public')->put('category/'.$imageName,$category_image);


            if (!Storage::disk('public')->exists('category/banner/')) {
                Storage::disk('public')->makeDirectory('category/banner/');
            }


            if (Storage::disk('public')->exists('category/banner/'.$category->category_banner)) {

                Storage::disk('public')->delete('category/banner/'.$category->category_banner);

            }

            $banner = Image::make($image)->resize(208,158)->stream();
            Storage::disk('public')->put('category/banner/'.$imageName,$banner);


        }else{

            $imageName = $category->category_banner;

        }

        $category->category_name = $request->category_name;
        $category->category_banner = $imageName;
        $category->updated_at = Carbon::now();
        $category->save();

        
        return redirect()->route('category.index')->with('massage','Category Update Successfull !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);

        if (Storage::disk('public')->exists('category/'.$category->category_banner)) {

            Storage::disk('public')->delete('category/'.$category->category_banner);

        }elseif (Storage::disk('public')->exists('category/banner/'.$category->category_banner)) {

            Storage::disk('public')->delete('category/banner/'.$category->category_banner);

        }

        $category->delete();

        return redirect()->route('category.index')->with('massage','Category Deteted Successfull !');
    
          
    }
}
