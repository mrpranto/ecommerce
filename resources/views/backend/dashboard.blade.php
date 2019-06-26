@extends("backend.layouts.master")

@section("title","Dashboard")

@section("css")


@endsection


@section("content")




    <div class="container-fluid">

        <div class="alert alert-dark">
            This is Dashboard for {{ auth()->user()->role->name }}
        </div>

    </div>




@endsection

@section("scripts")


@endsection