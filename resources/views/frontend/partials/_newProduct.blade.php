<section class="new_product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span>New Products</span></h2>
                </div>

            </div>
        </div>
        <div class="new_product_two_container">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-12">


                    <div class="product_carousel product_column3 owl-carousel">

                        @foreach($products as $product)


                            <div class="single_product">
                            <div class="product_thumb">
                                <a href="product-details.html">

                                    @foreach($product->product_images as $key => $product_image)

                                        <img src="{{ $product_image->product_image }}" alt="{{ $product->product_name }}">

                                    @if($key == 0)

                                        @break

                                     @endif

                                    @endforeach

                                </a>
                                <div class="label_product">
                                    <span class="label_sale">sale</span>
                                </div>
                                <div class="quick_button">
                                    <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_name">
                                    <h3><a href="product-details.html">{{ $product->product_name }}</a></h3>
                                </div>
                                <div class="product_rating">
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{ $product->price }}</span>
                                    <span class="old_price">{{ $product->price }}</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                        <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>