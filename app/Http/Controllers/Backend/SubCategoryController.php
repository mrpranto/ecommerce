<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->orderBy('id','desc')->get();
        return view('backend.subCategory.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.subCategory.create',compact('categories'));
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

            'sub_category_name' => 'required|unique:sub_categories,sub_category_name|max:100',
            'category_id' => 'required',
            'sub_category_banner' => 'required|image|max:1024',

        ],[
            'category_id.required' => 'Category Field is required.',
        ]);

        $image = $request->file('sub_category_banner');
        $slug  = str_slug($request->sub_category_name);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sub-category')) {
                Storage::disk('public')->makeDirectory('sub-category');
            }

            $category_image = Image::make($image)->resize(870,320)->save( $imageName,90);
            Storage::disk('public')->put('sub-category/'.$imageName,$category_image);



        }else{

            $imageName = 'default.png';

        }


        $subCategory = SubCategory::insert([

            'category_id'         => $request->category_id,
            'sub_category_name'   => $request->sub_category_name,
            'slug'                => $slug,
            'sub_category_banner' => $imageName,
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

        ]);


       if ($subCategory) {
        
        return redirect()->route('sub-category.create')->with('massage','Sub-Category Create Successfull !');

       } else {
        
        return redirect()->route('sub-category.create')->with('error','Somte thing is wrong !');
        
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
        $sub_category = SubCategory::find($id);

        if(!isset($sub_category->id)){
            return redirect()->route('sub-category.index');
        }


        return view('backend.subCategory.edit',compact('sub_category'));
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

            'sub_category_name' => 'unique:sub_categories,sub_category_name,'.$id.'|max:100',
            'category_id' => 'required',
            'sub_category_banner' => 'image|max:1024',

        ],[
            'category_id.required' => 'Category Field is required.',
        ]);

        $image = $request->file('sub_category_banner');
        $slug  = str_slug($request->sub_category_name);
        $subCategory = SubCategory::find($id);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sub-category')) {
                Storage::disk('public')->makeDirectory('sub-category');
            }

            if (Storage::disk('public')->exists('sub-category/'.$subCategory->sub_category_banner)) {
                Storage::disk('public')->delete('sub-category/'.$subCategory->sub_category_banner);
            }

            $category_image = Image::make($image)->resize(870,320)->save( $imageName,90);
            Storage::disk('public')->put('sub-category/'.$imageName,$category_image);




        }else{

            $imageName = 'default.png';

        }

        $subCategory->category_id = $request->category_id;
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->sub_category_banner = $imageName;
        $subCategory->updated_at =  Carbon::now();
        $subCategory->save();

        return redirect()->route('sub-category.index')->with('massage','Sub-Category Update Successfull !');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subCategory = SubCategory::find($id);

        if (Storage::disk('public')->exists('sub-category/'.$subCategory->sub_category_banner)) {
            Storage::disk('public')->delete('sub-category/'.$subCategory->sub_category_banner);
        }

        $subCategory->delete();

        return redirect()->route('sub-category.index')->with('massage','Sub-Category Deleted Successfull !');
    }
}
