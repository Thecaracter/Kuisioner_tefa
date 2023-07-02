@extends('layout.frontend')
@section('title', 'Survey Kepuasan Pelanggan')
@section('content')
    <section id="formulir" class="form section-bg mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="fw-bold">Survey Kepuasan Pelanggan</h2>
                    <form id="informasiForm">
                        <div class="mb-3">
                            <label for="perusahaan">Pilih Daerah Asal</label>
                            <select class="form-control select2" id="daerah" name="daerah" required>
                                <option value="">Pilih daerah</option>
                                @foreach ($daerah as $daerahItem)
                                    <option value="{{ $daerahItem->id }}">{{ $daerahItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="umur">Umur:</label>
                                    <input type="number" class="form-control" id="umur" name="umur" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="telepon">No. Telepon:</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="perusahaan">Pilih Perusahaan Asal</label>
                                    <select class="form-control select2" id="perusahaan" name="perusahaan" required>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach ($perusahaan as $perusahaanItem)
                                            <option value="{{ $perusahaanItem->id }}">{{ $perusahaanItem->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="posisi">Pilih Posisi</label>
                                    <select class="form-control select2" id="posisi" name="posisi">
                                        <option value="">Pilih Posisi</option>
                                        @foreach ($posisi as $posisiItem)
                                            <option value="{{ $posisiItem->id }}">{{ $posisiItem->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
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
        </div>

        <section id="question" class="question">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mx-auto">
                        <h2 class="fw-bold">Form Kuisioner</h2>
                        <form id="kuisionerForm">
                            <!-- <div class="mb-3">
              <label for="quisioner">Quisioner:</label>
             </div> -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="70%">Pertanyaan</th>
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
                    <div class="col-md-12 text-center">

                        <button id="simpanButton" type="button" class="btn btn-success" onclick="simpanData()">
                            <span class="mr-2">Simpan</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

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
								<td align="center">
									<input type="radio" name="satisfaction_${detailQuisioner.id}" value="1">
								</td>
								<td align="center">
									<input type="radio" name="satisfaction_${detailQuisioner.id}" value="2">
								</td>
								<td align="center">
									<input type="radio" name="satisfaction_${detailQuisioner.id}" value="3">
								</td>
								<td align="center">
									<input type="radio" name="satisfaction_${detailQuisioner.id}" value="4">
								</td>
								<td align="center">
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
