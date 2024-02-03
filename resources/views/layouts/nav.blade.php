<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ETA</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#OurVision"> Our Vision</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactUs">contact us</a>
                    </li>
               
                    @if (Route::has('login'))
                        <li class="nav-item dropdown">
                            @auth
                                <a class="nav-link dropdown-toggle btn-primary" style="color: white" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="">Profile</a>

                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'volunteer')
                                        <a class="dropdown-item" href="/admin/adminDashboard">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Log out
                                    </a>
                                </div>
                            @else
                                <a class="nav-link btn-primary" style="color: white" href="{{ route('login') }}">Log
                                    in</a>
                            @endauth
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
