@extends('homepages.homepage')

@section('content')
<style>
    #section2 {
        background-color: #333; /* Black background */
        color: #fff; /* White text color for contrast */
    }

    #section2 h2 {
        color: #fff; /* Ensure the heading stands out */
    }

    #section2 p {
        color: #ddd; /* Slightly lighter text for readability */
    }

    #section2 .btn {
        background-color: #f39c12; /* A contrasting button color */
        color: #fff;
    }

    #section2 .btn:hover {
        background-color: #e67e22; /* Darken the button on hover */
    }
</style>

<div class="hero">
    <div class="container text-center">
        <h1 class="display-4 text-white">Welcome to Karve Club</h1>
        <p class="lead text-white">Your fitness journey starts here!</p>
    </div>
</div>

<!-- Section 1 (Image on left, text on right) -->
<section class="section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section (Left) -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('assets/src.jpeg') }}" class="img-fluid rounded shadow-lg" alt="Karve Club Image">
            </div>

            <!-- Text Section (Right) -->
            <div class="col-md-6">
                <h2 class="display-4 mb-4">Achieve Your Fitness Goals</h2>
                <p class="lead mb-3">At Karve Club, we have the best trainers and state-of-the-art equipment to help you reach your fitness goals. Join us today and get started on your fitness journey!</p>
                <p class="mb-3">Whether you are a beginner or a fitness enthusiast, Karve Club is here to support you every step of the way.</p>
                <a href="#join" class="btn btn-primary btn-lg mt-4">Join Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Section 2 (Text on left, image on right) -->
<section class="section py-5" id="section2">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Section (Left) -->
            <div class="col-md-6">
                <h2 class="display-4 mb-4">Train with the Best</h2>
                <p class="lead mb-3">Our expert trainers are here to guide you through personalized fitness plans. Achieve your fitness goals faster with professional guidance.</p>
                <p class="mb-3">Get the results you want in the shortest time. Start training with us today!</p>
                <a href="#contact" class="btn btn-secondary btn-lg mt-4">Contact Us</a>
            </div>

            <!-- Image Section (Right) -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('assets/src.jpeg') }}" class="img-fluid rounded shadow-lg" alt="Training Image">
            </div>
        </div>
    </div>
</section>

<!-- Google Map Section -->
<div class="container">
    <div id="map" class="my-5"></div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>© 2024 Karve Club. All rights reserved.</p>
        <p>
            <a href="#" class="text-white">Privacy Policy</a> |
            <a href="#" class="text-white">Terms of Use</a> |
            <a href="https://facebook.com" target="_blank" class="text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com" target="_blank" class="text-white"><i class="fab fa-instagram"></i></a>
        </p>
    </div>
</footer>
@endsection
