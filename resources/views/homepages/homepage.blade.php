<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Go Gym!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"rel="stylesheet">
    @stack('style')
    <style>
        body {
            @if (Route::currentRouteName() == 'home')
                background-image: url("{{ asset('assets/src.jpeg') }}");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            @else
                background-color: black;
            @endif
            color: white;
        }

        .jumbotron {
            background-color: transparent;
            padding: 4rem 0;
        }

        .container {
            text-align: center;
            font-family: 'Bebas Neue', sans-serif;
        }

        h1 {
            font-size: 6rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .lead {
            font-size: 1.5rem;
        }

        .btn-primary {
            border: none;
        }

        .navbar {
            background-color: transparent;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107;
        }

        .footer {
            background-color: #343a40;
            padding: 20px 0;
            text-align: center;
            color: white;
        }

        .footer a {
            color: #ffc107;
        }

        .footer a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/arnold.png') }}" alt="Gym Box Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- Dropdown for Join -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="joinDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Join
                        </a>
                        <div class="dropdown-menu" aria-labelledby="joinDropdown">
                            <a class="dropdown-item" href="{{ route('visit.create_data_visit') }}">Visit Now</a>
                            <a class="dropdown-item" href="{{ route('member.create_data_member') }}">Join Member</a>
                        </div>
                    </li>
                    <!-- Dropdown for Data -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Data
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dataDropdown">
                            <a class="dropdown-item" href="{{ route('visit.data_visit') }}">Data Visit</a>
                            <a class="dropdown-item" href="{{ route('member.data_member') }}">Data Member</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@stack('script')

</html>
