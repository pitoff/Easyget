@extends('layouts.dashboard')
@section('page_body')

<div class="row">

    <div class="card mt-5 col-md-4 offset-4">
    
        <div class="card-header text-center">
            <span style="font-size: 30px;"><em>Create Business</em></span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('dashboard.create-business')}}">
                @csrf
                <div class="">
                    <label for="inputEmail4">Business Category</label>
                    <select class="form-select" name="business_cat" id="inputGroupSelect01">
                        <option value="">Choose...</option>
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                    @error('business_cat')
                        <em>{{$message}}</em>
                    @enderror

                </div>
                <div class="">
                    <label for="inputPassword4">Name</label>
                    <input type="text" class="form-control" name="business_name" id="inputEmail4">
                    @error('business_name')
                        <em>{{$message}}</em>
                    @enderror
                </div>
                <div class="">
                    <label for="inputPassword4">Description</label>
                    <textarea name="description" class="form-control" id="inputEmail4" cols="30" rows="4"></textarea>
                    @error('description')
                        <em>{{$message}}</em>
                    @enderror
                </div>
                <div class="">
                    <label for="inputPassword4">Land_Mark</label>
                    <input type="text" class="form-control" name="land_mark" id="inputEmail4">
                    @error('land_mark')
                        <em>{{$message}}</em>
                    @enderror
                </div>
                <div class="">
                    <label for="inputPassword4">Address</label>
                    <input type="text" class="form-control" name="address" id="inputEmail4">
                    @error('address')
                        <em>{{$message}}</em>
                    @enderror
                </div>
                <div class="">
                    <label for="inputPassword4">Contact</label>
                    <input type="text" class="form-control" name="contact" id="inputEmail4">
                    @error('contact')
                        <em>{{$message}}</em>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Submit</button>

            </form>
        </div>
    </div>

</div>

@endsection