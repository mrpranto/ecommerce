@extends("backend.layouts.master")

@section("title","Dashboard")

@section("css")


@endsection


@section("content")




    <div class="container-fluid">

        @if(session()->get('success'))

        <div class="alert alert-success">
           {{ session()->get('success') }}
        </div>

        @endif

        <div class="alert alert-dark">
            This is Dashboard for
            {{ auth()->user()->role->name }}
        </div>

    </div>




@endsection

@section("scripts")


@endsection