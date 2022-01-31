@extends('layouts.home')
@section('page_body')

<div class="row">


    <div class="card mt-5 col-md-4 offset-4">
        <div class="card-header">
            Login credentials
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4">
                </div>
                
                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Login</button>
                <em class="pr-1"> <a href="">Forgot password?</a></em>

            </form>
        </div>
    </div>
    
</div>

@endsection