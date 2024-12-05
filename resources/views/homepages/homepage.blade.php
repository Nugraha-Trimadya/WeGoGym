<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Join Karve Club for the best fitness experience. Offering personal training, group classes, and wellness programs to help you achieve your fitness goals.">
    <meta name="keywords" content="Karve Club, fitness, personal training, gym, wellness programs, group classes">
    <meta name="author" content="Karve Club">
    <title>Karve Club</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .hero {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('{{ asset('assets/bg.jpeg') }}') no-repeat center/cover;
            color: #fff;
            height: 100vh; /* Full screen height */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 1rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: slideIn 1s ease-out;
        }

        .hero p {
            font-size: 1.5rem;
            animation: fadeInText 2s ease-in-out;
        }

        .section {
            padding: 3rem 1rem;
            text-align: center;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 2rem;
        }

        .card {
            background: #fff;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 1rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        footer {
            background: #333;
            color: #fff;
            padding: 2rem 1rem;
            text-align: center;
            margin-top: 2rem;
        }

        footer a {
            color: #f39c12;
            text-decoration: none;
            margin: 0 0.5rem;
        }

        footer a:hover {
            text-decoration: underline;
        }

        #map {
            height: 400px;
            width: 100%;
            margin-top: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        #section2{
          background-color: rgba(0, 0, 0, 0.4);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes fadeInText {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

    </style>
    @stack('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" aria-label="Karve Club Homepage">
                <img src="{{ asset('assets/arnold.png') }}" alt="Karve Club Logo" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="joinDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-users"></i> Join
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="joinDropdown">
                            <li><a class="dropdown-item" href="{{ route('visit.create_data_visit') }}">Visit Now</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('member.create_data_member') }}">Join Member</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dataDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-database"></i> Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li><a class="dropdown-item" href="{{ route('visit.data_visit') }}">Data Visit</a></li>
                            <li><a class="dropdown-item" href="{{ route('member.data_member') }}">Data Member</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
    @stack('script')
    <script>
        function initMap() {
            var gymLocation = {
                lat: -6.58901,
                lng: 106.78948
            }; // Replace with your gym's latitude and longitude
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: gymLocation
            });
            var marker = new google.maps.Marker({
                position: gymLocation,
                map: map
            });
        }
    </script>
</body>

</html>
