<?php

use App\Models\ManagerRequest;

    $count = ManagerRequest::where('status', '')->count();
    
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EasyGet</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/app_index.css')}}">
    <link rel="stylesheet" href="{{asset('fontstyle/myfont.css')}}">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="/">Home</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    @auth
                    @if (auth()->user()->is_admin())
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="">Owners</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="">Regular's</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{route('admin.view-make-manager-requests')}}">
                            <button type="button" class="btn btn-primary position-relative login_btn">
                                Requests
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   {{$count}} +
                                    <span class="visually-hidden">unread requests</span>
                                </span>
                            </button>
                            </a>
                        </li>

                        <li class="nav-item pull-right">

                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-1 mr-2 login_btn">Logout</button>
                            </form>

                        </li>

                    </ul>

                    @elseif (auth()->user()->is_manager())

                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{route('dashboard.home')}}">My Business</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{route('dashboard.create-business')}}">Create Business</a>
                        </li>

                        <li class="nav-item pull-right">

                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Logout</button>
                            </form>

                        </li>

                    </ul>

                    @else

                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="">All Business</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="">Become Manager</a>
                        </li>

                        <li class="nav-item pull-right">

                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-2 mr-2 login_btn">Logout</button>
                            </form>

                        </li>

                    </ul>

                    @endif

                    @endauth

                </div>
            </div>
        </nav>

        @yield('page_body')

    </div>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
@yield('scripts')

</body>

</html>