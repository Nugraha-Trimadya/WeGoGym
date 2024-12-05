@extends('homepages.homepage')

@section('content')
    <div class="container mt-5 pt-5"> <!-- Added pt-5 for top padding -->
        <h3 class="mb-4" style="font-size: 2rem; color: #333; font-weight: 600;">Daftar Member</h3>

        {{-- Success message --}}
        @if (Session::get('success'))
            <div class="alert alert-success mb-4">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Add new member button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('member.create_data_member') }}" class="btn btn-warning py-2 px-4">Tambah Member</a>
            <form class="d-flex w-50" role="Search" action="{{ route('member.data_member') }}" method="GET">
                <input type="text" name="search_member" class="form-control me-2" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        {{-- Members table --}}
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>No Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($members->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Data kosong</td>
                        </tr>
                    @else
                        @foreach ($members as $index => $member)
                            <tr>
                                <td>{{ ($members->currentPage() - 1) * $members->perPage() + ($index + 1) }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->age }}</td>
                                <td>{{ $member->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $member->membership_number }}</td>
                                <td>
                                    {{-- Edit button --}}
                                    <a href="{{ route('member.edit_data_member', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    {{-- Delete button with modal trigger --}}
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="showModal('{{ $member->id }}', '{{ $member->name }}')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination links --}}
        <div class="d-flex justify-content-end">
            {{ $members->links() }}
        </div>

        {{-- Delete confirmation modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="form-delete-member" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content" style="background-color: black; color: white;">
                        <div class="modal-header" style="background-color: #343a40;">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini: <span id="nama-member"></span>?
                        </div>
                        <div class="modal-footer" style="background-color: #343a40;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endsection

    @push('script')
        <script>
            // Function to trigger the modal and set the form action dynamically
            function showModal(id, name) {
                let urlDelete = "{{ route('member.delete_data_member', ':member') }}";
                urlDelete = urlDelete.replace(':member', id);
                document.getElementById('form-delete-member').setAttribute('action', urlDelete);
                document.getElementById('nama-member').innerText = name;

                // Show the modal using Bootstrap 5 JavaScript method
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            }
        </script>
    @endpush
