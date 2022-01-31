@extends('layouts.dashboard')
@section('page_body')

<div class="row mt-5">
<em class="msg">{{session('MadeManager')}}</em>
<div class="col-md-8 offset-2">
    Make manager Requests
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Request</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($makeManagerRequests as $key => $mr)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$mr->user->name}}</td>
                <td>{{$mr->user->email}}</td>
                <td>{{$mr->my_request}}</td>
                <td>
                    <form method="POST" action="{{route('admin.make-manager', $mr->user->id)}}">
                        @csrf @method('PUT')

                        @if (!($mr->status === 'accepted'))
                            <button type="submit" class="btn btn-secondary">Accept</button></td>
                        @endif
                            <em>Accepted</em>
                        
                    </form>
                <td>
                <form method="POST" action="{{route('admin.decline-manager', $mr->id)}}">
                   @csrf @method('DELETE')
                    @if (!($mr->status === 'accepted'))
                        <button type="submit" class="btn btn-danger">Decline</button></td>
                    @endif
                </form>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
</div>

<script>
    function clrMsg(){
        const msg = document.querySelector('.msg');
        setTimeout(function(){
            msg.remove()
        }, 2000);

    }

    clrMsg();
</script>

@endsection