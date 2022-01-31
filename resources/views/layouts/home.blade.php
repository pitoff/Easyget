<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyGet</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/app_index.css')}}">
    <link rel="stylesheet" href="{{asset('fontstyle/myfont.css')}}">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{route('register')}}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="{{route('login')}}">Login</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('page_body')
        


    </div>

</body>
<script src="{{asset('js/app.js')}}"></script>

</html>