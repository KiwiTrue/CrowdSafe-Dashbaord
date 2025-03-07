<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Crowd Control App')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.heat/0.2.0/leaflet-heat.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.css">

    <style>
        body {
            background-color: #223871;
            color: white;
        }
        .navbar {
            background-color: #d9d9d9;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .navbar .nav-link {
            color: black !important;
            transition: color 0.3s ease-in-out;
        }
        .navbar .nav-link:hover {
            color:rgb(0, 60, 255) !important; /* Smooth Hover Effect */
        }
        /* Make Navbar Sticky */
        .navbar.fixed-top {
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        /* Active Link Highlight */
        .navbar .nav-link.active {
            color:rgb(47, 0, 255) !important; /* Highlighted color */
            font-weight: bold;
            border-bottom: 2px solid rgb(0, 140, 255); /* Underline effect */
        }
                .logout-form {
            display: inline;
        }
        .welcome  {
            color: black !important;
        }
        .crowdsafe{
            color: #b49312;
            font-size: 150%;
            font-weight: bold;

        }

        .container {
            
            gap: 10px;
            padding: 10px;
            max-width: 1500px;
            margin: 0 auto;
        }
        .btn-logout {
            background-color: #444;
            border: none;
        }
        .btn-logout:hover {
            background-color: #666;
        }


        /*.item {
            background: #4c6196;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        video {
            width: 100%;
            border-radius: 10px;
            border: 2px solid #4caf50;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }

        button:disabled {
            background-color: #a5d6a7;
            cursor: not-allowed;
        }

        /* h2 {
            margin-bottom: 10px;
        } */
        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand crowdsafe" href="{{ route('dashboard') }}">CrowdSafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('live_feed') ? 'active' : '' }}" href="{{ route('live_feed') }}">Live Feed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('smart_surveillance') ? 'active' : '' }}" href="{{ route('smart_surveillance') }}">Smart Surveillance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('facial_recognition') ? 'active' : '' }}" href="{{ route('facial_recognition') }}">Facial Recognition</a>
                </li>
            </ul>

            @auth
            <div class="d-flex align-items-center ms-3">
                <span class="text-white me-3 welcome">Welcome, {{ Auth::user()->name }}</span>
                <form class="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-logout">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
