@extends('layouts.home')
@section('page_body')

<div class="page_body">

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="text-center">Easy <span class="fa fa-search"></span> Get</h1>
            <hr>
        </div>

    </div>

    <!-- form search section -->
    <div class="row">

        <div class="card-body col-lg-12 col-md-12 col-sm-12">
            <form action="{{route('business.search')}}" method="GET">
                @csrf
                <div class="input-group mb-3 mt-2">
                    <select class="form-select" name="category" id="inputGroupSelect04">
                        <option value="">Choose...</option>
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach

                    </select>

                    <button class="btn btn-outline-secondary" type="submit">Get</button>

                </div>
            </form>

            <em class="mt-3">select from categories to see available business...</em>
        </div>

    </div>

</div>

@endsection()