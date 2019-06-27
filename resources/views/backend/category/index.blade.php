@extends("backend.layouts.master")

    @section("title","Category List")


    @section("page-title")

        <i class="mdi mdi-brightness-5"></i> Category List

    @endsection




    @section("css")

        <link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Multi Item Selection examples -->
        <link href="{{ asset('backend/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">




    @endsection


@section("content")


    <div class="row">

        <div class="col-sm-12">

            <div class="card-box">
                <h4 class="title text-center">@yield('page-title')</h4>
                <br>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>

                            <button class="btn btn-sm btn-info" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal" title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>

                            <button class="btn btn-sm btn-danger" title="Delete">
                                <i class="fa fa-trash-o"></i>
                            </button>

                        </td>

                    </tr>



                    </tbody>
                </table>


            </div>

        </div>

    </div>



@endsection

@section("scripts")

    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Key Tables -->
    <script src="{{ asset('backend/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <!-- Selection table -->
    <script src="{{ asset('backend/plugins/datatables/dataTables.select.min.js') }}"></script>
    <!-- App js -->



    <script type="text/javascript">
        $(document).ready(function() {

            $('#datatable').DataTable();

        });
    </script>

@endsection