@extends('layouts.dashboard')
@section('page_body')

<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header text-center">
                {{$business->category->category}}
                <div class="row"><em style="font-size: 20px;"> {{$business->business_name}}</em></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="card-title"><span class="fa fa-phone-square"></span>: {{$business->contact}}</h5>
                    </div>

                    <div class="col-md-6">
                        <p class="card-title"><span class="fa fa-cloud"></span>: {{$business->description}}</p>
                    </div>

                    <div class="col-md-3">
                        <p class="card-text"><span class="fa fa-location-arrow"></span>: {{$business->address}}</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="{{route('dashboard.add-photo', ['user_id' => $business->user_id, 'category_id' => $business->category_id, 'business_id' => $business->id])}}" class="btn btn-primary login_btn">Add Photo</a>
                    </div>
                </div>

                <div class="row mt-4">

                    @forelse ($business_photo as $bphoto)
                    <div class="col-md-6 col-lg-6 col-sm-12 mb-2">
                        <div class="card">
                            <img src="/images/{{$business->business_name}}/{{$bphoto->photos}}" class="card-img-top" alt="..." style="height: 280px;">
                            <div class="card-body">
                                <h5 class="card-title">Created: <em>{{$bphoto->created_at->diffForHumans()}}</em> </h5>
                                <p class="card-text">{{$bphoto->description}}.</p>
                                <!-- <a href="#" class="btn btn-secondary">make Background</a> -->

                                <form action="{{route('dashboard.remove-business-photo', $bphoto->id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <span class="fa fa-trash"></span> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <em>Business has no Photo</em>
                    @endforelse

                </div>
            </div>
            <div class="card-footer text-muted d-flex justify-content-center">

                <a href="#" class="btn btn-outline">Load More</a>
                <a href="{{route('dashboard.home')}}" class="btn btn-outline">
                    <- back to businesses</a>

            </div>
        </div>
    </div>
</div>

@endsection