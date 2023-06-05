@extends('layout.applanding')
@section('title', 'Landing Page')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="container">
                    <h2>Informasi Pribadi</h2>
                    <form id="informasiForm">
                        <div class="form-group">
                            <label for="perusahaan">Pilih Daerah Asal</label>
                            <select class="form-control select2" id="daerah" name="daerah" required>
                                <option value="">Pilih daerah</option>
                                @foreach ($daerah as $daerahItem)
                                    <option value="{{ $daerahItem->id }}">{{ $daerahItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur:</label>
                            <input type="number" class="form-control" id="umur" name="umur" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">No. Telepon:</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan">Pilih Perusahaan Asal</label>
                            <select class="form-control select2" id="perusahaan" name="perusahaan" required>
                                <option value="">Pilih Perusahaan</option>
                                @foreach ($perusahaan as $perusahaanItem)
                                    <option value="{{ $perusahaanItem->id }}">{{ $perusahaanItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="posisi">Pilih Posisi</label>
                            <select class="form-control select2" id="posisi" name="posisi">
                                <option value="">Pilih Posisi</option>
                                @foreach ($posisi as $posisiItem)
                                    <option value="{{ $posisiItem->id }}">{{ $posisiItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quisioner">Pilih Quisioner</label>
                            <select class="form-control select2" id="quisioner" name="quisioner" onchange="showQuestion()">
                                <option value="">Pilih Quisioner</option>
                                @foreach ($quisioners as $quisioner)
                                    <option value="{{ $quisioner->id }}">{{ $quisioner->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 mx-auto">
                <div class="container">
                    <h2>Form Kuisioner</h2>
                    <form id="kuisionerForm">
                        <div class="form-group">
                            <label for="quisioner">Quisioner:</label>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pertanyaan</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                    </tr>
                                </thead>
                                <tbody id="quisioner-questions">
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 d-flex justify-content-center">
            <button id="simpanButton" type="button" class="btn btn-primary" onclick="simpanData()">
                <span class="mr-2">Simpan</span>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- Mengimpor jQuery dan Ajax library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Mengimpor library Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function simpanData() {
            var informasiForm = $('#informasiForm').serialize();
            var kuisionerForm = $('#kuisionerForm').serializeArray();

            axios.post("/store", informasiForm, {
                    params: {
                        detail_quisioner: kuisionerForm
                    }
                })
                .then(function(response) {
                    // Respon berhasil
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.data.message
                    });
                    document.getElementById("informasiForm").reset();
                    document.getElementById("kuisionerForm").reset();
                    // console.log(response.data.message);
                    // console.log(kuisionerForm);
                    // console.log(informasiForm);
                })
                .catch(function(error) {
                    // Respon gagal
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat menyimpan data'
                    });

                    console.log(error);
                });
        }
    </script>

    <script>
        function showQuestion() {
            var quisionerId = $('#quisioner').val();

            if (quisionerId) {
                axios.get("{{ route('get-kuisioner') }}", {
                        params: {
                            quisioner_id: quisionerId
                        }
                    })
                    .then(function(response) {
                        var detailQuisioners = response.data;
                        var questionTable = $('#quisioner-questions');
                        questionTable.empty();

                        if (detailQuisioners && detailQuisioners.length > 0) {
                            detailQuisioners.forEach(function(detailQuisioner) {
                                var questionRow = `
                            <tr>
                                <td>${detailQuisioner.pertanyaan}</td>
                                <td>
                                    <input type="radio" name="satisfaction_${detailQuisioner.id}" value="1">
                                </td>
                                <td>
                                    <input type="radio" name="satisfaction_${detailQuisioner.id}" value="2">
                                </td>
                                <td>
                                    <input type="radio" name="satisfaction_${detailQuisioner.id}" value="3">
                                </td>
                                <td>
                                    <input type="radio" name="satisfaction_${detailQuisioner.id}" value="4">
                                </td>
                                <td>
                                    <input type="radio" name="satisfaction_${detailQuisioner.id}" value="5">
                                </td>
                            </tr>
                        `;
                                questionTable.append(questionRow);
                            });
                        } else {
                            var emptyRow = `
                        <tr>
                            <td colspan="6">Tidak ada pertanyaan yang tersedia</td>
                        </tr>
                    `;
                            questionTable.append(emptyRow);
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            } else {
                $('#quisioner-questions').empty();
            }
        }
    </script>
    <script>
        // Memilih elemen navbar-toggler
        var navbarToggler = document.querySelector('.navbar-toggler');

        // Memilih elemen navbar-collapse
        var navbarCollapse = document.querySelector('.navbar-collapse');

        // Menambahkan event listener pada navbar-toggler
        navbarToggler.addEventListener('click', function() {
            // Toggle kelas 'show' pada navbar-collapse
            navbarCollapse.classList.toggle('show');
        });
    </script>
@endsection
