@extends("backend.layouts.master")

@section("title","Add New Brand")

@section("page-title")

    <i class="fa fa-plus"></i> Add New Brand

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

                    <form action="{{ route('brand.store') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="brand_name" class="col-3 col-form-label"></label>
                            <div class="col-9">

                                @if (session()->get('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_name" class="col-3 col-form-label">Brand Name <sup class="text-danger">*</sup></label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('brand_name') ? ' is-invalid' : '' }}" id="brand_name" name="brand_name" value="{{ old('brand_name') }} " placeholder="Brand Name">
                            
                                @if ($errors->has('brand_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand_name') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="brand_logo" class="col-3 col-form-label">Brand Logo <sup class="text-danger">*</sup></label>
                            <div class="col-9">
                                
                                <input class="form-control{{ $errors->has('brand_logo') ? ' is-invalid' : '' }}" id="uploadImage" type="file" name="brand_logo" onchange="PreviewImage();" />

                                @if ($errors->has('brand_logo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand_logo') }}</strong>
                                    </span>
                                @endif
                    

                            </div>


                        </div>


                        <div class="form-group row">
                            <label class="col-3 col-form-label"></label>
                            <div class="col-9">
                                
                                    <img id="uploadPreview" class="img-thumbnails" width="100px"/>

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
                                
                                <a href="{{ route('brand.index') }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-list-alt"></i> Brand List
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