@extends('layouts.home')
@section('page_body')

<div class="row">


    <div class="card mt-5 col-md-4 offset-4">
        <div class="card-header">
            Sign Up
        </div>

        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="card-body">
                <div class="">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" name="name" id="inputEmail4">
                </div>

                <div class="">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>

                <div class="">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4">
                </div>

                <div class="">
                    <label for="inputPassword4">Retype-Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="inputPassword4">
                </div>

                
                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Submit</button>
                <em class="pl-2"> <a href="{{route('login')}}">Have account? Login</a></em>
            </div>
        </form>

    </div>
    
</div>

@endsection