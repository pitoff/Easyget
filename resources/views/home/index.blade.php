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
            <div class="input-group mb-3 mt-2">
                <select class="form-select" id="inputGroupSelect04">
                    <option selected>Choose...</option>
                    <option value="1">Restaurants</option>
                    <option value="2">Barber shops</option>
                    <option value="3">Hotels</option>
                    <option value="3">Gym</option>
                    <option value="3">Garden</option>
                </select>

                <button class="btn btn-outline-secondary" type="button">Get</button>

            </div>

            <em class="mt-3">select from categories to see available locations...</em>
        </div>

    </div>

</div>

@endsection()