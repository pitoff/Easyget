@extends('layouts.dashboard')
@section('page_body')

<div class="row mt-5">
    <div class="col-md-8 offset-2">

        <h1 class="mb-2">{{$business->category}}</h1>

        <div class="row">
            @forelse ($businesses as $business)
            <div class="col-sm-6 mb-2">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">{{$business->business_name}}</h5>
                        <p class="card-text">
                            {{$business->description}}
                        </p>

                        <a href="{{route('single-business', $business->id)}}" class="btn btn-outline-secondary"><span class="fa fa-eye"></span></a>

                    </div>
                </div>
            </div>
            @empty
            <em class="text-center">You have no {{$business->category}} business</em>
            @endforelse

        </div>

    </div>
    <a href="{{route('dashboard.home')}}" class="btn btn-outline">
        <- back to businesses
    </a>

</div>

@endsection