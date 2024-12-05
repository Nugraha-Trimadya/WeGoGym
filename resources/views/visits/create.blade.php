@extends('homepages.homepage')

@section('content')
<div class="container mt-5" style="padding-top: 80px;">
    <h1 class="text-center mb-5" style="font-size: 2.5rem; color: #333; font-weight: 600;">Welcome Bro!</h1>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Section -->
    <div class="row justify-content-center" style="border: 1px solid #ccc; border-radius: 10px; padding: 30px; background-color: #ffffff;">
        <div class="col-md-8">
            <form method="POST" action="{{ route('visit.store_data_visit') }}">
                @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="form-label fs-5">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                </div>
                <!-- Age Field -->
                <div class="mb-4">
                    <label for="age" class="form-label fs-5">Umur</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required placeholder="Masukkan umur">
                </div>
                <!-- Gender Field -->
                <div class="mb-4">
                    <label for="gender" class="form-label fs-5">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 py-3 fs-5" style="border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: all 0.3s;">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <style>
        /* Body Padding to Offset Fixed Navbar */
        body {
            padding-top: 70px; /* Adjust this if your navbar height is different */
        }

        /* Form Field Focus Style */
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
        }

        /* Button Hover Effect */
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:active {
            background-color: #004085;
        }

        /* Error Message Styles */
        .alert-danger {
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .alert ul {
            list-style-type: none;
            padding-left: 0;
        }

        .alert li {
            margin-bottom: 10px;
        }

    </style>
@endsection
