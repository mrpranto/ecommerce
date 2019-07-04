@extends("backend.layouts.master")

    @section("title","Product List")


    @section("page-title")

        <i class="mdi mdi-brightness-5"></i> Product List

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
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Sub Sub-Category</th>
                        <th>Price</th>
                        <th>New Price</th>
                        <th>status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($products as $key => $product)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td><span class="badge badge-pill badge-primary">{{ $product->category->category_name }}</span></td>
                        <td><span class="badge badge-pill badge-primary">{{ $product->sub_category->sub_category_name }}</span></td>
                        <td><span class="badge badge-pill badge-primary">{{ $product->sub_sub_category->sub_sub_category_name }}</span></td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ number_format($product->new_price) }}</td>
                        <td> @if($product->active == 1) <span class="badge badge-pill badge-success">Activate</span> @else <span class="badge badge-pill badge-danger">Deactivate</span> @endif</td>
                        <td>{{ Carbon\Carbon::parse($product->created_at)->format('F d, Y  h:i s A') }}</td>
                        <td>{{ Carbon\Carbon::parse($product->updated_at)->format('F d, Y  h:i s A') }}</td>
                        
                        
                        <td>
                            
                            @if($product->active == 0)

                            <a href="{{ route('sub-sub-category.edit',$product->id) }}" class="btn btn-sm btn-success" title="Active">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </a>

                            @else

                            <a href="{{ route('sub-sub-category.edit',$product->id) }}" class="btn btn-sm btn-warning" title="Deactive">
                               <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                            </a>

                            @endif

                            <a href="{{ route('sub-sub-category.edit',$product->id) }}" class="btn btn-sm btn-pink waves-effect waves-light" data-toggle="modal" data-target="#myModal"  title="View Details">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>


                            <a href="{{ route('sub-sub-category.edit',$product->id) }}" class="btn btn-sm btn-info"  title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <button  class="btn btn-sm btn-danger" title="Delete" onclick="delete_sub_sub_category({{ $product->id }})">
                                <i class="fa fa-trash-o"></i>
                            </button>


                            <form id="sub-sub-category-delete-{{ $product->id }}" action="{{ route('sub-sub-category.destroy',$product->id) }}" method="post">

                                @csrf
                                @method('DELETE')

                            </form>

                        </td>


                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">{{ $product->product_name }} - Details</h4></div>
                                    <div class="modal-body">
                                    
                                        <dl class="row mb-0">
                                            
                                            <dt class="col-sm-3">Product Name</dt>
                                            <dd class="col-sm-9">: {{ $product->product_name }}</dd>
                                            
                                            
                                            <dt class="col-sm-3">Category</dt>
                                            <dd class="col-sm-9">: {{ $product->category->category_name }}</dd>
                                            
                                            
                                            <dt class="col-sm-3">Sub Category</dt>
                                            <dd class="col-sm-9">: {{ $product->sub_category->sub_category_name }}</dd>
                                            
                                            
                                            <dt class="col-sm-3">Sub Sub-Category</dt>
                                            <dd class="col-sm-9">: {{ $product->sub_sub_category->sub_sub_category_name }}</dd>
                                            
                                            
                                            
                                            <dt class="col-sm-3">Short Description</dt>
                                            <dd class="col-sm-9">{!! $product->short_description !!}</dd>
                                            
                                            
                                            
                                            <dt class="col-sm-3">Long Description</dt>
                                            <dd class="col-sm-9">{!! $product->long_description !!}</dd>

                                             
                                            <dt class="col-sm-3">Tags</dt>
                                            <dd class="col-sm-9">: 
                                                @php 
                                                
                                                $tags = explode(',',$product->tags);

                                                foreach ($tags as $tag) {
                                                
                                                    @endphp

                                                    <span class="badge badge-pill badge-info">{{ $tag }}</span>
                                                   
                                                    @php

                                                }
                                                
                                                @endphp
                                            
                                            </dd>
                                            
                                            <dt class="col-sm-3">S.K.U</dt>
                                            <dd class="col-sm-9">: {{ $product->sku }}</dd>
                                            
                                            
                                            
                                            <dt class="col-sm-3">Color</dt>
                                            <dd class="col-sm-9">: {{ $product->color->color_name }}</dd>
                                            
                                            
                                            
                                            <dt class="col-sm-3">Size</dt>
                                            <dd class="col-sm-9">: {{ $product->size }}</dd>
                                            
                                            
                                            
                                            
                                            
                                            <dt class="col-sm-3">Price</dt>
                                            <dd class="col-sm-9">: {{ number_format($product->price) . '.tk'}}</dd>
                                            
                                            
                                            
                                            
                                            
                                            <dt class="col-sm-3">New Price</dt>
                                            <dd class="col-sm-9">: {{ number_format($product->new_price)  . '.tk'}}</dd>
                                            
                                            
                                            
                                            
                                            
                                            <dt class="col-sm-3">Status</dt>
                                            <dd class="col-sm-9">:  @if($product->active == 1) <span class="badge badge-pill badge-success">Activate</span> @else <span class="badge badge-pill badge-danger">Deactivate</span> @endif</dd>
                                            
                                            
                                            
                                            
                                            <dt class="col-sm-3">Created At</dt>
                                            <dd class="col-sm-9">: {{ Carbon\Carbon::parse($product->created_at)->format('F d, Y  h:i s A') }}</dd>
                                            
                                            
                                            
                                            <dt class="col-sm-3">Updated At</dt>
                                            <dd class="col-sm-9">: {{ Carbon\Carbon::parse($product->updated_at)->format('F d, Y  h:i s A') }}</dd>
                                            
                                            
                                            
                                            
                                        </dl>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>




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