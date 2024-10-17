@extends('homepages.homepage')

@section('content')
    <div class="container mt-5">
        <h3>Edit Member</h3>

        {{-- Success message --}}
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Member edit form --}}
        <form action="{{ route('member.update_data_member', $member->id) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- Name field --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}">
                @error('name') 
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Age field --}}
            <div class="mb-3">
                <label for="age" class="form-label">Umur</label>
                <input type="number" name="age" class="form-control" value="{{ old('age', $member->age) }}">
                @error('age') 
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gender field --}}
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" class="form-control">
                    <option value="L" {{ old('gender', $member->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender', $member->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Membership number field (read-only) --}}
            <div class="mb-3">
                <label for="membership_number" class="form-label">Nomor Anggota</label>
                <input type="text" name="membership_number" class="form-control" value="{{ old('membership_number', $member->membership_number) }}" readonly>
                @error('membership_number') 
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Update Member</button>
        </form>
    </div>
@endsection
