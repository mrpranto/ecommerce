@extends("backend.layouts.master")

@section("title","Edit Category")

@section("page-title")

    <i class="fa fa-pencil-square-o"></i> Edit Category

@endsection


@section("css")


@endsection


@section("content")



    <div class="row">

        <div class="col-sm-8 offset-md-2">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                <br>

                <form action="{{ route('category.update',$category->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

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
                        <label for="category_name" class="col-3 col-form-label">Category Name <sup class="text-danger">*</sup></label>
                        <div class="col-9">
                            <input type="text" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" id="category_name" name="category_name" value="{{ $category->category_name }}">

                            @if ($errors->has('category_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_name') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_banner" class="col-3 col-form-label">Category Banner <sup class="text-danger">*</sup></label>
                        <div class="col-9">
                            
                            <input class="form-control{{ $errors->has('category_banner') ? ' is-invalid' : '' }}" id="uploadImage" type="file" name="category_banner" onchange="PreviewImage();" />

                            @if ($errors->has('category_banner'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_banner') }}</strong>
                                </span>
                            @endif
                

                        </div>


                    </div>


                    <div class="form-group row">
                        <label class="col-3 col-form-label"></label>
                        <div class="col-9">
                            
                                <img id="uploadPreview" src="{{ Storage::disk('public')->url('category/'.$category->category_banner) }} " class="img-thumbnails" width="100px"/>

                        </div>


                    </div>



                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                            </button>

                            <a href="{{ route('category.index') }}" class="btn btn-dark waves-effect waves-light">
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