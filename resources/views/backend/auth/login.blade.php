@extends("backend.layouts.auth_master")

@section("title","Login")

@section("css")


@endsection


@section("content")




    <form class="" action="#">
        <div class="form-group m-b-20 row">
            <div class="col-12">
                <label for="emailaddress">Email address</label>
                <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12"><a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                <label for="password">Password</label>
                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <div class="checkbox checkbox-custom">
                    <input id="remember" type="checkbox" checked="">
                    <label for="remember">Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
            </div>
        </div>
    </form>
    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
        </div>
    </div>




@endsection

@section("scripts")


@endsection