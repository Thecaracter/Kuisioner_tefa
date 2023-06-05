@extends('layout.app')

@section('title', 'Data Quisioner')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Quisioner</h4>

                            <div class="align-right text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createUserModal">
                                    Tambah Quisioner
                                </button>
                            </div>

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
                                            <th class="text-center">Nama Quisioner</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quisioners as $index => $quisioner)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $quisioner->nama }}</td>
                                                <td class="text-center">
                                                    @if ($quisioner->status == '1')
                                                        <span class="badge badge-success">Ditampilkan</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak Ditampilkan</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editModal{{ $quisioner->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $quisioner->id }}" method="post"
                                                            action="{{ route('quisioner.destroy', $quisioner->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $quisioner->id }}')">Delete</button>
                                                        </form>
                                                    </span>
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

    <!-- Add User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add form content here -->
                    <form action="{{ route('quisioner.store') }}" method="post">
                        @csrf
                        <!-- Add form fields here -->
                        <div class="form-group">
                            <label for="nama">Nama Quisioner</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Ditampilkan</option>
                                <option value="2">Tidak Ditampilkan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit User Modal -->
    @foreach ($quisioners as $quisioner)
        <div class="modal fade" id="editModal{{ $quisioner->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editUModalLabel{{ $quisioner->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel{{ $quisioner->id }}">Edit Quisioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Update form content here -->
                        <form action="{{ route('quisioner.update', $quisioner->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Update form fields here -->
                            <div class="form-group">
                                <label for="edit_nama">Nama Quisioner</label>
                                <input type="text" class="form-control" id="edit_nama" name="nama"
                                    value="{{ $quisioner->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Status</label>
                                <select class="form-control" id="edit_status" name="status" required>
                                    <option value="1" {{ $quisioner->status == '1' ? 'selected' : '' }}>Ditampilkan
                                    </option>
                                    <option value="2" {{ $quisioner->status == '2' ? 'selected' : '' }}>Tidak
                                        Ditampilkan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


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
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
