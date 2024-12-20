@extends('homepages.homepage')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Data Visit</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Update Data Visit -->
        <form method="POST" action="{{ route('visit.update_data_visit', $visit->id) }}">
            @csrf
            @method('PATCH') <!-- Tetap gunakan PATCH untuk memperbarui data -->

            <!-- Name field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $visit->name ?? old('name') }}" required>
            </div>

            <!-- Age field -->
            <div class="form-group mb-3">
                <label for="age" class="form-label">Umur</label>
                <input type="number" name="age" class="form-control" value="{{ $visit->age ?? old('age') }}" required>
            </div>

            <!-- Gender field -->
            <div class="form-group mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-select" required>
                    <option value="L" {{ $visit->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $visit->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
