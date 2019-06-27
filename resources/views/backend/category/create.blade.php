@extends("backend.layouts.master")

@section("title","Add New Category")

@section("page-title")

    <i class="fa fa-plus"></i> Add New Category

@endsection


@section("css")

    <link href="{{ asset('backend/plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css">

@endsection


@section("content")



    <div class="row">

        <div class="col-sm-8 offset-md-2">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                <br>

                    <form class="form-horizontal" role="form">

                        <div class="form-group row">
                            <label for="category_name" class="col-3 col-form-label">Category Name <sup class="text-danger">*</sup></label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="category_name" placeholder="Category Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_banner" class="col-3 col-form-label">Category Banner <sup class="text-danger">*</sup></label>
                            <div class="col-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div>
                                        <button type="button" class="btn btn-custom btn-rounded btn-sm btn-file"><span class="fileupload-new"><i class="fa fa-check"></i> Select image</span> <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" class="btn-light">
                                        </button></div>
                                    <div class="fileupload-new thumbnail mt-3" style="width: 200px; height: 150px;"><img src="{{ asset('backend/assets/images/small/img-1.jpg') }}" alt="image" class="img-thumbnail"></div>

                                    <div class="fileupload-preview fileupload-exists thumbnail mt-3" style="max-width: 200px; max-height: 150px; "></div>


                                </div>
                            </div>
                        </div>



                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    <i class="fa fa-save"></i> Save
                                </button>

                                <button type="reset" class="btn btn-dark waves-effect waves-light">
                                    <i class="fa fa-refresh"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>



            </div>

        </div>

    </div>






@endsection

@section("scripts")

    <script src="{{ asset('backend/plugins/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script src="{{ asset('backend/plugins/dropzone/dropzone.js') }}"></script>

@endsection