@extends('homepages.homepage')

@section('content')
    <div class="jumbotron">
        <div class="container ">
            <h1>Transformation Begins with Determination.</h1>
            <p class="lead">This is Website for Gym.</p>
            <!-- Membungkus tombol dengan link agar arahkan ke route yang benar -->
            <a href="{{ route('member.create_data_member') }}" class="btn btn-secondary btn-lg" role="button">
                Join Now!
            </a>
            <p>Ready to get Member?</p>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 We Go Gym! All rights reserved.</p>
            <p>Terms and Conditions | <a href="#">See details</a></p>
        </div>
    </footer>
@endsection
