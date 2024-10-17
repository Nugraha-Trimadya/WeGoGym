@extends('homepages.homepage')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Welcome GymBro!</h1>

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

        <!-- Form Input Data Visit -->
        <!-- Form Input Data Visit -->
        <form method="POST" action="{{ route('visit.store_data_visit') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="age">Umur</label>
                <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Simpan</button>
        </form>

    </div>
@endsection