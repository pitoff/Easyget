@extends('layouts.dashboard')
@section('page_body')

<div class="row">


    <div class="card mt-5 col-md-4 offset-4">
        <div class="card-header">
            Create Category
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('addCategory')}}">
                @csrf
                <div class="">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" name="category" id="inputEmail4">
                    @error('category')
                        <em class="msg">{{$message}}</em>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn"> Add Category </button>

            </form>
        </div>
        
    </div>

</div>

<script>
    function clearMsg()
    {
        const msg = document.querySelector('.msg');
        setTimeout( function (){
            msg.remove()
        }, 2000);
    }
    clearMsg();
</script>
@endsection