<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\SubCategory;
use App\Models\Sub_sub_Category;

class Sub_subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_subCategories = Sub_sub_Category::with('category','sub_category')->orderBy('id','desc')->get();
        return view('backend.sub_subCategory.index',compact('sub_subCategories'));
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
        $data['subCategories'] = SubCategory::orderBy('id','desc')->get();

        return view('backend.sub_subCategory.create',$data);

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

            'sub_sub_category_name' => 'required|unique:sub_sub__categories,sub_sub_category_name|max:100',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_banner' => 'required|image|max:1024',

        ],[
            'category_id.required' => 'Category Field is required.',
            'sub_category_id.required' => 'Sub Category Field is required.',
        ]);

        $image = $request->file('sub_sub_category_banner');
        $slug  = str_slug($request->sub_sub_category_name);

        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sub-sub-category')) {
                Storage::disk('public')->makeDirectory('sub-sub-category');
            }

            $category_image = Image::make($image)->resize(870,320)->save( $imageName,90);
            Storage::disk('public')->put('sub-sub-category/'.$imageName,$category_image);



        }else{

            $imageName = 'default.png';

        }


        $sub_subCategory = Sub_sub_Category::insert([

            'category_id'         => $request->category_id,
            'sub_category_id'         => $request->sub_category_id,
            'sub_sub_category_name'   => $request->sub_sub_category_name,
            'slug'                => $slug,
            'sub_sub_category_banner' => $imageName,
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

        ]);


       if ($sub_subCategory) {
        
        return redirect()->route('sub-sub-category.create')->with('massage','Sub Sub-Category Create Successfull !');

       } else {
        
        return redirect()->route('sub-sub-category.create')->with('error','Somte thing is wrong !');
        
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_subCategory = Sub_sub_Category::find($id);
        $subCategories = SubCategory::orderBy('id','desc')->get();

        if(!isset($sub_subCategory->id)){
            return redirect()->route('sub-sub-category.index');
        }


        return view('backend.sub_subCategory.edit',compact('sub_subCategory','subCategories'));
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

            'sub_sub_category_name' => 'required|unique:sub_sub__categories,sub_sub_category_name,'.$id.'|max:100',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_banner' => 'image|max:1024',

        ],[
            'category_id.required' => 'Category Field is required.',
            'sub_category_id.required' => 'Sub Category Field is required.',
        ]);

        $image = $request->file('sub_sub_category_banner');
        $slug  = str_slug($request->sub_sub_category_name);

        $sub_sub_category = Sub_sub_Category::find($id);


        if (isset($image)) {
            
            $current_date = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$current_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sub-sub-category')) {
                Storage::disk('public')->makeDirectory('sub-sub-category');
            }

            if (Storage::disk('public')->exists('sub-sub-category/'.$sub_sub_category->sub_sub_category_banner)) {
                Storage::disk('public')->delete('sub-sub-category/'.$sub_sub_category->sub_sub_category_banner);
            }

            $category_image = Image::make($image)->resize(870,320)->save( $imageName,90);
            Storage::disk('public')->put('sub-sub-category/'.$imageName,$category_image);


        }else{

            $imageName = 'default.png';

        }

        $sub_sub_category->category_id = $request->category_id;
        $sub_sub_category->sub_category_id = $request->sub_category_id;
        $sub_sub_category->sub_sub_category_name = $request->sub_sub_category_name;
        $sub_sub_category->sub_sub_category_banner = $imageName;
        $sub_sub_category->updated_at = Carbon::now();
        $sub_sub_category->save();


        return redirect()->route('sub-sub-category.index')->with('massage','Sub Sub-Category Updated Successfull !');

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $sub_sub_category = Sub_sub_Category::find($id);

        if (Storage::disk('public')->exists('sub-sub-category/'.$sub_sub_category->sub_sub_category_banner)) {
            Storage::disk('public')->delete('sub-sub-category/'.$sub_sub_category->sub_sub_category_banner);
        }

        $sub_sub_category->delete();
        
        return redirect()->route('sub-sub-category.index')->with('massage','Sub Sub-Category Deleted Successfull !');


    }
}
