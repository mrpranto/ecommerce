<section class="slider_section mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle">Categories</h2>
                    </div>
                    <div class="categories_menu_toggle">
                        <ul>

                            @foreach($categories as $key => $category)




                                <li class="menu_item_children categorie_list"><a href="{{ url('category/'.$category->slug) }}"><span><i
                                                    class="zmdi zmdi-star"></i></span>

                                        {{ $category->category_name }}

                                        @if($category->sub_categories->count() > 0) <i
                                                class="fa fa-angle-right"></i> @endif
                                    </a>

                                    @if($category->sub_categories->count() > 0)

                                        <ul class="categories_mega_menu">

                                            @foreach($category->sub_categories as $sub_category)

                                                <li class="@if($sub_category->sub_sub_categories->count() > 0) menu_item_children @endif"><a
                                                            href="{{ url('category/'.$category->slug.'/'.$sub_category->slug) }}">{{ $sub_category->sub_category_name }}</a>

                                                    @if($sub_category->sub_sub_categories->count() > 0)

                                                        <ul class="categorie_sub_menu">

                                                            @foreach($sub_category->sub_sub_categories as $sub_sub_category)

                                                                <li><a href="{{ url('category/'.$category->slug.'/'.$sub_category->slug.'/'.$sub_sub_category->slug) }}">
                                                                        <small>{{ $sub_sub_category->sub_sub_category_name }}</small>
                                                                    </a></li>

                                                            @endforeach

                                                        </ul>

                                                        @endif

                                                </li>

                                            @endforeach

                                        </ul>


                                    @endif

                                </li>




                                @if($key == 8)
                                    @break
                                @endif

                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!--shipping area start-->

                <!--shipping area end-->
                <div class="slider_area owl-carousel">
                    <div class="single_slider" data-bgimg="{{ asset('frontend/assets/img/slider/slider1.jpg') }}">
                        <div class="slider_content content_position_center">
                            <h1>New</h1>
                            <h2>Designer Funiture! </h2>
                            <span>elite collections! </span>
                            <a href="shop.html">shop now</a>
                        </div>
                    </div>
                    <div class="single_slider d-flex align-items-center"
                         data-bgimg="{{ asset('frontend/assets/img/slider/slider2.jpg') }}">
                        <div class="slider_content content_position_left">
                            <h1>New</h1>
                            <h2>Designer Funiture! </h2>
                            <span>elite collections! </span>
                            <a href="shop.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>