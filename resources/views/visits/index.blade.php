@extends('homepages.homepage')

@section('content')
    <div class="container mt-5">
        <h3>Data Visit</h3>
        
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('visit.create_data_visit') }}" class="btn btn-warning">Tambah Kunjungan</a>
            <form class="d-flex me-2" role="Search" action="{{route('visit.data_visit')}}" method="GET">
                <input type="text" name="search_visit" class="form-control me-2" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-dark border-0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Jam Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($visits) < 1)
                        <tr>
                            <td colspan="6" class="text-center">Data kosong</td>
                        </tr>
                    @else
                        @foreach ($visits as $index => $visit)
                            <tr>
                                <td>{{ ($visits->currentPage() - 1) * $visits->perPage() + ($index + 1) }}</td>
                                <td>{{ $visit->name }}</td>
                                <td>{{ $visit->age }}</td>
                                <td>{{ $visit->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $visit->time }}</td>
                                <td>
                                    <a href="{{ route('visit.edit_data_visit', $visit->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="showModal('{{ $visit['id'] }}', '{{ $visit['name'] }}')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $visits->links() }}
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-delete-visit" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Visit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus data ini: <span id="nama-visit"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function showModal(id, name) {
            let urlDelete = "{{ route('visit.delete_data_visit', ':visit') }}";
            urlDelete = urlDelete.replace(':visit', id);
            document.getElementById('form-delete-visit').setAttribute('action', urlDelete);
            document.getElementById('nama-visit').innerText = name;
            var modalElement = document.getElementById('exampleModal');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>
@endpush
