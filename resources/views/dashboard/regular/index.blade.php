@extends('layouts.dashboard')
@section('page_body')

<div class="row mt-5">
    <div class="col-md-8 offset-2">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Businesses</h5>
                        <p class="card-text">Check out businnesses near you to help solve your daily needs.</p>
                        <a href="#" class="btn btn-primary login_btn">Go to Businesses</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manager</h5>
                        <p class="card-text">Send request to become a manager, add and advertise anything you do so people can find you.</p>
                        
                        @if($checkIfManagerRequestExist)
                            
                            <button class="btn btn-outline-secondary" type="button"><em>Awaiting response</em></button>

                            @else
                            
                            <form method="POST" action="{{route('dashboard.make-manager-request')}}">
                                @csrf
                                <input type="hidden" name="status" value="make manager">
                                <button type="submit" class="btn btn-primary login_btn">Become Manager</button>
                            </form>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
            <em class="text-center">{{session('RequestCreated')}}</em>
        </div>

    </div>

</div>

@endsection