@extends("backend.layouts.master")

    @section("title","Sub Sub-Category List")


    @section("page-title")

        <i class="mdi mdi-brightness-5"></i> Sub Sub-Category List

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

                <div class="card-tools" style="position:absolute;right:2rem;top:1.5rem;">
                    <a href="{{ route('sub-sub-category.create') }}" class="btn btn-sm btn-primary text-right"> <i class="fa fa-plus"></i> Add New</i></a>
                </div>
                
                <br>

                @if (session()->get('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            


                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Sub Sub-Category Name</th>
                        <th>Parent Category</th>
                        <th>Parent Sub-Category</th>
                        <th>Sub Sub-Category Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($sub_subCategories as $key => $sub_subCategory)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $sub_subCategory->sub_sub_category_name }}</td>
                        <td><span class="badge badge-pill badge-primary">{{ $sub_subCategory->category->category_name }}</span></td>
                        <td><span class="badge badge-pill badge-primary">{{ $sub_subCategory->sub_category->sub_category_name }}</span></td>
                        <td><img src="{{ Storage::disk('public')->url('sub-sub-category/'.$sub_subCategory->sub_sub_category_banner) }}" alt="{{ $sub_subCategory->sub_sub_category_name }}" width="100px;"></td>
                        <td>{{ Carbon\Carbon::parse($sub_subCategory->created_at)->format('F d, Y  h:i s A') }}</td>
                        <td>{{ Carbon\Carbon::parse($sub_subCategory->updated_at)->format('F d, Y  h:i s A') }}</td>
                        
                        
                        <td>

                            <a href="{{ route('sub-sub-category.edit',$sub_subCategory->id) }}" class="btn btn-sm btn-info" class="btn btn-primary waves-effect waves-light" title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <button  class="btn btn-sm btn-danger" title="Delete" onclick="delete_sub_sub_category({{ $sub_subCategory->id }})">
                                <i class="fa fa-trash-o"></i>
                            </button>


                            <form id="sub-sub-category-delete-{{ $sub_subCategory->id }}" action="{{ route('sub-sub-category.destroy',$sub_subCategory->id) }}" method="post">

                                @csrf
                                @method('DELETE')

                            </form>

                        </td>

                        <script type="text/javascript">
                            function delete_sub_sub_category(id) {

                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You want to delete this!",
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#1ad680',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-check-circle"></i> Yes',
                                    cancelButtonText: '<i class="fa fa-times-circle"></i> No'
                                }).then((result) => {
                                    if (result.value) {

                                        event.preventDefault();
                                        document.getElementById('sub-sub-category-delete-'+id).submit();

                                    }
                                })


                            }
                        </script>

                    </tr>


                    @endforeach





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