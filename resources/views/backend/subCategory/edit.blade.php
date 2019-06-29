@extends("backend.layouts.master")

@section("title","Edit Sub-Category")

@section("page-title")

    <i class="fa fa-pencil-square-o"></i> Edit Sub-Category

@endsection


@section("css")


@endsection


@section("content")



    <div class="row">

        <div class="col-sm-8 offset-md-2">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                <br>

                <form action="{{ route('sub-category.update',$sub_category->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="category_name" class="col-4 col-form-label"></label>
                        <div class="col-8">

                            @if (session()->get('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="sub_category_name" class="col-4 col-form-label">Sub-Category Name <sup class="text-danger">*</sup></label>
                        <div class="col-8">
                            <input type="text" class="form-control{{ $errors->has('sub_category_name') ? ' is-invalid' : '' }}" id="sub_category_name" name="sub_category_name" value="{{ $sub_category->sub_category_name }}">

                            @if ($errors->has('sub_category_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sub_category_name') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="category" class="col-4 col-form-label">Category <sup class="text-danger">*</sup></label>
                        <div class="col-8">
            
                              <select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" id="category">
                                <option>- Select Category -</option>
                            
                                    @foreach ($categories as $category)

                                        <option @if($category->id == $sub_category->category_id) selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>

                                    @endforeach                                    

                              </select>
                            

                            @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sub_category_banner" class="col-4 col-form-label">Sub-Category Banner <sup class="text-danger">*</sup></label>
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
                            
                                <img id="uploadPreview" src="{{ Storage::disk('public')->url('sub-category/'.$sub_category->sub_category_banner) }} " class="img-thumbnails" width="100px"/>

                        </div>


                    </div>



                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">
                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                            </button>

                            <a href="{{ route('sub-category.index') }}" class="btn btn-dark btn-sm waves-effect waves-light">
                                <i class="fa fa-backward"></i> Cancel
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