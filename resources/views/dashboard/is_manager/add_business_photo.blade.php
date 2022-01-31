@extends('layouts.dashboard')
@section('page_body')

<div class="row">

    <div class="card mt-5 col-md-4 offset-4">

        <div class="card-header text-center">
            <span style="font-size: 30px;"><em>Add Business Photo</em></span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('dashboard.add-photo')}}" enctype="multipart/form-data">
                @csrf

                <div class="">
                    <label for="inputPassword4">Business Photo</label>
                    <input type="file" class="form-control" name="photo" id="formFile">
                    @error('photo')
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
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="category_id" value="{{$category_id}}">
                <input type="hidden" name="business_id" value="{{$business_id}}">

                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Add Photo</button>

            </form>
        </div>
    </div>

</div>

@endsection