@extends("backend.layouts.master")

@section("title","Add New Product")

@section("page-title")

    <i class="fa fa-plus"></i> Add New Product

@endsection


@section("css")

<link href="{{  asset('backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet">

<link href="{{ asset('backend/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">.thumb-image{float:left;width:100px;position:relative;padding:5px;border: 1px solid #ededed;margin: 10px;}</style>

@endsection


@section("content")



    <div class="row">

        <div class="col-sm-12">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                
                <div class="card-tools" style="position:absolute;right:2rem;top:1.5rem;">
                    
                </div>
                <br>

                    <form action="{{ route('product.store') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-3 col-form-label"></label>
                            <div class="col-9">

                                @if (session()->get('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                

                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="product_name" class="col-3 col-form-label">Product Title <sup class="text-danger">*</sup></label>
                            <div class="col-9">
                                <input type="text" class="form-control form-control-lg{{ $errors->has('product_name') ? ' is-invalid' : '' }}" id="product_name" name="product_name" value="{{ old('product_name') }} " placeholder="Product Name">
                            
                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="category" class="col-3 col-form-label">Category <sup class="text-danger">*</sup></label>
                            <div class="col-6">
                                
                                    <select id="category" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" onchange="get_sub_cat();" name="category_id">
                                        <option value="">- Select Category -</option>
                                        
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->category_name }}</option>
                                        @endforeach

                                        
                                    </select>
                                

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>




                        
                        <div class="form-group row">
                            <label for="sub_category" class="col-3 col-form-label">Sub Category <sup class="text-danger">*</sup></label>
                            <div class="col-6">
                                
                                    <select id="sub_category" class="form-control{{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}" onchange="get_sub_sub_cat();" name="sub_category_id">
                                        
                                        <option value="">- Select Sub Category -</option>

                                        @if (old('sub_category_id'))

                                        @foreach ($subcategories as $subcategory)
                                            <option @if(old('sub_category_id') == $subcategory->id) selected @endif  value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                                        @endforeach

                                        @endif
                                        
                                    </select>
                                

                                @if ($errors->has('sub_category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sub_category_id') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="sub_sub_category" class="col-3 col-form-label">Sub Sub-Category <sup class="text-danger">*</sup></label>
                            <div class="col-6">
                                
                                    <select id="sub_sub_category" class="form-control{{ $errors->has('sub_sub_category_id') ? ' is-invalid' : '' }}" name="sub_sub_category_id">
                                        <option value="">- Select Sub Sub-Category -</option>

                                        @if (old('sub_sub_category_id'))

                                            @foreach ($sub_sub_categories as $sub_sub_category)
                                                <option @if(old('sub_sub_category_id') == $sub_sub_category->id) selected @endif value="{{ $sub_sub_category->id }}">{{ $sub_sub_category->sub_sub_category_name }}</option>
                                            @endforeach

                                        @endif

                                        
                                    </select>
                                

                                @if ($errors->has('sub_sub_category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sub_sub_category_id') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>


                        
                        
                        <div class="form-group row">
                                <label for="brand" class="col-3 col-form-label"> Brand <sup class="text-danger">*</sup></label>
                                <div class="col-6">
                                    
                                        <select id="brand" class="form-control{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id">
                                            <option value="">- Select Brands -</option>
    
                                            @foreach ($brands as $brands)
                                                <option @if(old('brand_id') == $brands->id) selected @endif  value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                                            @endforeach
    
                                            
                                        </select>
                                    
    
                                    @if ($errors->has('brand_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('brand_id') }}</strong>
                                        </span>
                                    @endif
                                
                                </div>
                            </div>



                        <div class="form-group row">
                            <label for="short_description" class="col-3 col-form-label">Short Description </label>
                            <div class="col-9">
                                
                                <textarea name="short_description">{{ old('short_description') }}</textarea>


                                @if ($errors->has('short_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>




                        <div class="form-group row">
                            <label for="long_description" class="col-3 col-form-label">Long Description </label>
                            <div class="col-9">
                                
                                <textarea name="long_description">{{ old('long_description') }}</textarea>


                                @if ($errors->has('long_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('long_description') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>




                        <div class="form-group row">
                            <label for="tags" class="col-3 col-form-label">Tags </label>
                            <div class="col-6">
                                
                                <div class="tags-default">
                                    <input type="text" class="form-control" name="tags" value="{{ old('tags') }}" data-role="tagsinput" placeholder="add tags">
                
                                </div>


                                @if ($errors->has('tags'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>



                        <div class="form-group row">
                            <label for="sku" class="col-3 col-form-label">S.K.U <sup class="text-danger">*</sup></label>
                            <div class="col-4">
                                
                                <input type="text" id="sku" class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}" value="{{ old('sku') }}" name="sku">
                                

                                @if ($errors->has('sku'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="color" class="col-3 col-form-label">Color <sup class="text-danger">*</sup></label>
                            <div class="col-4">
                                
                                <select class="form-control{{ $errors->has('color_id') ? ' is-invalid' : '' }}" name="color_id" >

                                    <option value="">- Select Color -</option>
                                    @foreach ($colors as $color)
                                        <option @if(old('color_id') == $color->id) selected @endif value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach

                                </select>
                                

                                @if ($errors->has('color_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color_id') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="size" class="col-3 col-form-label">Size <sup class="text-danger">*</sup></label>
                            <div class="col-4">
                                
                                    <select class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" >
                                        
                                            <option value="">- Select Size -</option>
                                        @foreach ($sizes as $size)
                                            <option @if(old('size') == $size->size) selected @endif  value="{{ $size->size }}">{{ $size->size }}</option>
                                        @endforeach

                                    </select>



                                @if ($errors->has('size'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                            <label for="size" class="col-3 col-form-label">Size <sup class="text-danger">*</sup></label>
                            <div class="col-4">
                                
                                    <select class="selectpicker{{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" multiple="multiple" data-style="btn-light">
                                        
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                        @endforeach

                                    </select>



                                @if ($errors->has('size'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div> --}}



                        <div class="form-group row">
                            <label for="price" class="col-3 col-form-label">Price <sup class="text-danger">*</sup></label>
                            <div class="col-4">
                                
                                    <input type="number" step="0.0" name="price" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}" placeholder="0.00">
                                

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="new_price" class="col-3 col-form-label">New Price</label>
                            <div class="col-4">
                                
                                <input type="number" step="0.0" name="new_price" id="new_price" class="form-control" value="{{ old('new_price') }}" placeholder="0.00">
                                

                                @if ($errors->has('new_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_price') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="fileUpload" class="col-3 col-form-label">Product Images <sup class="text-danger">*</sup></label>
                            <div class="col-6">
                                
                                <input class="form-control{{ $errors->has('product_image') ? ' is-invalid' : '' }}" id="fileUpload" multiple="multiple" type="file" name="product_image[]" />

                                @if ($errors->has('product_image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>


                        <div class="form-group row">
                            <label class="col-3 col-form-label"></label>
                            <div class="col-9">
                                
                                <div id="image-holder"></div>


                            </div>


                        </div>



                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-save"></i> Save
                                </button>

                                <button type="reset" class="btn btn-dark btn-sm">
                                    <i class="fa fa-refresh"></i> Reset
                                </button>
                                
                                <a href="{{ route('product.index') }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-list-alt"></i> Product List
                                </a>
                            
                            </div>
                        </div>

                       
                    </form>



            </div>

        </div>

    </div>






@endsection

@section("scripts")

<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<script src="{{  asset('backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script type="text/javascript">

      
       
</script>




<script>
        CKEDITOR.replace( 'short_description' );
</script>
<script>
        CKEDITOR.replace( 'long_description' );
</script>

<script type="text/javascript">
    function get_sub_cat(){
              var id=document.getElementById("category").value;
            //   alert(id);
              
              $.ajax({
              url  : "{{ route('admin.product.sub-Categoires') }}",
              type : "get",
              data : {id:id},
              success : function(response){
                //   alert(response);
               $('#sub_category').html(response);

                },
                error : function(xhr, status){
                  alert('There is some error.Try after some time.');
                }
            });
            
    }

    function get_sub_sub_cat(){
              var id=document.getElementById("sub_category").value;
            //   alert(id);
              
              $.ajax({
              url  : "{{ route('admin.product.sub-sub-Categoires') }}",
              type : "get",
              data : {id:id},
              success : function(response){
                //   alert(response);
               $('#sub_sub_category').html(response);

                },
                error : function(xhr, status){
                  alert('There is some error.Try after some time.');
                }
            });
            
    }
</script>


<script type="text/javascript">

    $(document).ready(function() {
            $("#fileUpload").on('change', function() {
              //Get count of selected files
              var countFiles = $(this)[0].files.length;
              var imgPath = $(this)[0].value;
              var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
              var image_holder = $("#image-holder");
              image_holder.empty();
              if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                  //loop for each file selected for uploaded.
                  for (var i = 0; i < countFiles; i++) 
                  {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                      $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                      }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[i]);
                  }
                } else {
                  alert("This browser does not support FileReader.");
                }
              } else {
                alert("Pls select only images");
              }
            });
          });
    </script>
    



<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>


@endsection