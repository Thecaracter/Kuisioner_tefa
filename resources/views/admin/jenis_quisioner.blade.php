@extends('layout.app')

@section('title', 'Jenis Quisioner')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Jenis Quisioner</h4>

                            <div class="align-right text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createUserModal">
                                    Tambah Jenis Quisioner
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
                                            <th class="text-center">Jenis Quisioner</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $item->jenis }}</td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editModal{{ $item->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $item->id }}" method="post"
                                                            action="{{ route('jenisq.destroy', $item->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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
    <!-- Add Perusahaan Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Tambah Jenis Quisioner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Quisioner Form -->
                    <form action="{{ route('jenisq.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="jenis">Jenis Quisioner</label>
                            <input type="text" class="form-control" id="jenis" name="jenis"
                                placeholder="Jenis Quisioner" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Perusahaan Modal -->
    @foreach ($jenis as $index => $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Quisioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Quisioner Form -->
                        <form action="{{ route('jenisq.update', $item->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="edit_jenis{{ $item->id }}">Jenis Quisioner</label>
                                <input type="text" class="form-control" id="edit_jenis{{ $item->id }}"
                                    name="jenis" placeholder="Jenis Quisioner" value="{{ $item->jenis }}" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
