@extends("frontend.layouts.master")

@section("title","Home")

@section("css")


@endsection


@section("content")






    @include('frontend.partials._sliders')

    @include('frontend.partials._category_show')

    {{--@include('frontend.partials._deals')--}}

    {{--@include('frontend.partials._newProduct')--}}

    {{--@include('frontend.partials._banner')--}}

    @include('frontend.partials._category_products')

    @include('frontend.partials._custom_product')




@endsection

@section("scripts")


@endsection