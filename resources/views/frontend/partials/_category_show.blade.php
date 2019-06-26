<section class="category_product_area mt-30 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="category_product_carousel category_column4 owl-carousel">

                    @foreach($categories as $category)

                        <div class="single_category_product">
                            <div class="category_product_thumb">
                                <a href="{{ url('category/'.$category->slug) }}"><img src="{{ $category->category_banner }}" alt="{{ $category->category_name }}"></a>
                            </div>
                            <div class="category_product_name">
                                <h2><a href="{{ url('category/'.$category->slug) }}">{{ $category->category_name }}</a></h2>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>