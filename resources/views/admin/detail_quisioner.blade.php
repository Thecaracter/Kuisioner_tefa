@extends('layout.app')

@section('title', 'Data Detail Quisioner')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Detail</h4>
                            <!-- Tampilkan pesan kesalahan -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="align-right text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createUserModal">
                                    Tambah Detail Quisioner
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
                                            <th class="text-center">Pertanyaan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quisioners as $index => $quisioner)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $quisioner->nama }}</td>
                                                <td>{{ $quisioner->pertanyaan }}</td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editModal{{ $quisioner->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $quisioner->id }}" method="post"
                                                            action="{{ route('detail-quisioner.destroy', $quisioner->id) }}"
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

    <!-- Add Detail Quisioner Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Tambah Detail Quisioner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Detail Quisioner Form -->
                    <form action="{{ route('detail-quisioner.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Quisioner</label>
                            <select class="form-control" id="nama" name="nama" required>
                                <option value="">Select Quisioner</option>
                                @foreach ($quis as $item)
                                    <option>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_pertanyaan">Pertanyaan</label>
                            <textarea class="form-control" id="edit_pertanyaan" name="pertanyaan" placeholder="Pertanyaan" required>{{ $quisioner->pertanyaan }}</textarea>
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
    <!-- Update Detail Quisioner Modal -->
    @foreach ($quisioners as $quisioner)
        <div class="modal fade" id="editModal{{ $quisioner->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $quisioner->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $quisioner->id }}">Edit Detail Quisioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Update Detail Quisioner Form -->
                        <form action="{{ route('detail-quisioner.update', $quisioner->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nama">Nama Quisioner</label>
                                <select class="form-control" id="nama" name="nama" required>
                                    <option value="">Select Quisioner</option>
                                    @foreach ($quis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $quisioner->quisioner_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_pertanyaan">Pertanyaan</label>
                                <textarea class="form-control" id="edit_pertanyaan" name="pertanyaan" placeholder="Pertanyaan" required>{{ $quisioner->pertanyaan }}</textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
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
