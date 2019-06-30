@extends("backend.layouts.master")

@section("title","Add New Sub Category")

@section("page-title")

    <i class="fa fa-plus"></i> Add New Sub Category

@endsection


@section("css")



@endsection


@section("content")



    <div class="row">

        <div class="col-sm-8 offset-md-2">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                
                <div class="card-tools" style="position:absolute;right:2rem;top:1.5rem;">
                   
                </div>
                <br>

                    <form action="{{ route('sub-category.store') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="category_name" class="col-3 col-form-label"></label>
                            <div class="col-9">

                                @if (session()->get('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_name" class="col-4 col-form-label">Sub-Category Name <sup class="text-danger">*</sup></label>
                            <div class="col-8">
                                <input type="text" class="form-control{{ $errors->has('sub_category_name') ? ' is-invalid' : '' }}" id="sub_category_name" name="sub_category_name" value="{{ old('sub_category_name') }} " placeholder="Sub Category Name">
                            
                                @if ($errors->has('sub_category_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sub_category_name') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="category_id" class="col-4 col-form-label">Category <sup class="text-danger">*</sup></label>
                            <div class="col-8">
                
                                  <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category_id">
                                    <option value="">- Select Category -</option>
                                
                                        @foreach ($categories as $category)

                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>

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
                            <label for="category_banner" class="col-4 col-form-label">Sub-Category Banner <sup class="text-danger">*</sup></label>
                            <div class="col-8">
                                
                                <input class="form-control{{ $errors->has('sub_category_banner') ? ' is-invalid' : '' }}" id="uploadImage" type="file" name="sub_category_banner" onchange="PreviewImage();" />

                                @if ($errors->has('sub_category_banner'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sub_category_banner') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>


                        <div class="form-group row">
                            <label class="col-4 col-form-label"></label>
                            <div class="col-8">
                                
                                    <img id="uploadPreview" class="img-thumbnails" width="100px"/>

                            </div>


                        </div>



                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-save"></i> Save
                                </button>

                                <button type="reset" class="btn btn-dark btn-sm">
                                    <i class="fa fa-refresh"></i> Reset
                                </button>

                                <a href="{{ route('sub-category.index') }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-list-alt"></i> Sub Category List
                                </a>
                                
                            </div>
                        </div>

                       
                    </form>



            </div>

        </div>

    </div>






@endsection

@section("scripts")


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