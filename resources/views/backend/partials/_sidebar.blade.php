<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!-- LOGO -->
        <div class="topbar-left"><a href="{{ route("admin.dashboard") }}" class="logo"><span><img src="{{ asset('backend/assets/images/logo.png') }}" alt="" height="22"> </span><i><img src="assets/images/logo_sm.png" alt="" height="28"></i></a></div>
        <!-- User box -->
        <div class="user-box">
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li><a href="javascript: void(0);" @if (Request::is('admin/category/*/edit')) class="mm-active" @endif ><i class="mdi mdi-brightness-5"></i><span class="badge badge-info badge-pill float-right">{{ $categories->count() }}</span> <span>Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('category.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add New</a></li>
                        <li @if (Request::is('admin/category/*/edit')) class="mm-active" @endif ><a href="{{route('category.index')}}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Category List</a></li>
                    </ul>
                </li>


                <li><a href="javascript: void(0);" @if (Request::is('admin/sub-category/*/edit')) class="mm-active" @endif ><i class=" mdi mdi-brightness-7"></i><span class="badge badge-info badge-pill float-right">{{ App\Models\SubCategory::count() }}</span> <span>Sub Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('sub-category.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add New</a></li>
                        <li @if (Request::is('admin/sub-category/*/edit')) class="mm-active" @endif ><a href="{{ route('sub-category.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Sub Category List</a></li>
                    </ul>
                </li>


                <li><a href="javascript: void(0);" @if (Request::is('admin/sub-sub-category/*/edit')) class="mm-active" @endif ><i class=" mdi mdi-brightness-6"></i><span class="badge badge-info badge-pill float-right">{{ App\Models\Sub_sub_category::count() }}</span> <span>Sub Sub Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('sub-sub-category.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add New</a></li>
                        <li @if (Request::is('admin/sub-sub-category/*/edit')) class="mm-active" @endif ><a href="{{ route('sub-sub-category.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Sub Sub Categories</a></li>
                    </ul>
                </li>


                <li><a href="javascript: void(0);" @if (Request::is('admin/brand/*/edit')) class="mm-active" @endif ><i class=" mdi mdi-wall"></i><span class="badge badge-info badge-pill float-right">{{ App\Models\Brand::count() }}</span> <span>Brand</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('brand.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add New</a></li>
                        <li @if (Request::is('admin/brand/*/edit')) class="mm-active" @endif ><a href="{{ route('brand.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Brand List</a></li>
                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>