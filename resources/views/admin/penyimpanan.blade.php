@extends('layout.app')

@section('title', 'Data Penyimpanan')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Tersimpan</h4>
                            <br>

                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama </th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Umur</th>
                                            <th class="text-center">No Telepon</th>
                                            <th class="text-center">Perusahaan</th>
                                            <th class="text-center">Posisi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penyimpanan as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $item->nama }}</td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <form id="deleteForm-{{ $item->id }}" method="post"
                                                            action="{{ route('penyimpanan.destroy', $item->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                        </form>
                                                    </span>
                                                    <a href="{{ route('detailpenyimpanan', $item->id) }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Yakin Mo Ngapus Bro?',
                text: "Nggak bakal bisa balik lo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form untuk menghapus data
                    document.getElementById('deleteForm-' + userId).submit();
                }
            });
        }
    </script>
@endsection
