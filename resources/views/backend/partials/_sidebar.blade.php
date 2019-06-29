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

                <li><a href="javascript: void(0);" @if (Request::is('admin/category/*/edit')) class="mm-active" @endif ><i class="mdi mdi-brightness-5"></i><span class="badge badge-info badge-pill float-right">{{ App\Models\Category::count() }}</span> <span>Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('category.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Add New</a></li>
                        <li @if (Request::is('admin/category/*/edit')) class="mm-active" @endif ><a href="{{route('category.index')}}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Category List</a></li>
                    </ul>
                </li>


                <li><a href="javascript: void(0);"><i class=" mdi mdi-brightness-7"></i><span class="badge badge-info badge-pill float-right">10</span> <span>Sub Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="form-elements.html">Add New</a></li>
                        <li><a href="form-advanced.html">Sub Category List</a></li>
                    </ul>
                </li>


                <li><a href="javascript: void(0);"><i class="mdi mdi-brightness-6"></i><span class="badge badge-info badge-pill float-right">10</span> <span>Sub sub Category</span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="form-elements.html">Add New</a></li>
                        <li><a href="form-advanced.html">Sub sub Category List</a></li>
                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>