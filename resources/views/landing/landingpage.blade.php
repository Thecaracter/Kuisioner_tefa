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
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur:</label>
                            <input type="number" class="form-control" id="umur" name="umur">
                        </div>
                        <div class="form-group">
                            <label for="telepon">No. Telepon:</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon">
                        </div>
                        <div class="form-group">
                            <label for="perusahaan">Pilih Perusahaan Asal</label>
                            <select class="form-control" id="perusahaan" name="perusahaan">
                                <option value="">Pilih Perusahaan</option>
                                @foreach ($perusahaan as $perusahaanItem)
                                    <option value="{{ $perusahaanItem->id }}">{{ $perusahaanItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="posisi">Pilih Posisi</label>
                            <select class="form-control" id="posisi" name="posisi">
                                <option value="">Pilih Posisi</option>
                                @foreach ($posisi as $posisiItem)
                                    <option value="{{ $posisiItem->id }}">{{ $posisiItem->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quisioner">Pilih Quisioner</label>
                            <select class="form-control" id="quisioner" name="quisioner" onchange="showQuestion()">
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
        <div class="text-center mt-4">
            <button id="simpanButton" type="button"
                class="btn btn-primary d-flex align-items-center justify-content-center">
                <span class="mr-2">Simpan</span>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- Mengimpor jQuery dan Ajax library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Mengambil referensi elemen tombol "Simpan"
        var simpanButton = document.getElementById("simpanButton");

        // Menambahkan event listener untuk menangani klik tombol "Simpan"
        simpanButton.addEventListener("click", function(event) {
            event.preventDefault(); // Mencegah aksi default tombol submit

            // Mengambil referensi elemen formulir
            var informasiForm = document.getElementById("informasiForm");
            var kuisionerForm = document.getElementById("kuisionerForm");

            // Mengambil nilai input dari formulir informasi pribadi
            var nama = document.getElementById("nama").value;
            var alamat = document.getElementById("alamat").value;
            var umur = document.getElementById("umur").value;
            var telepon = document.getElementById("telepon").value;
            var perusahaan = document.getElementById("perusahaan").value;
            var posisi = document.getElementById("posisi").value;

            // Mengambil nilai input dari formulir kuisioner
            var selectedQuisioner = document.getElementById("quisioner").value;
            var radioButtons = document.querySelectorAll("#quisioner-questions input[type='radio']:checked");
            var detailQuisioners = {};

            // Menyimpan jawaban kuisioner dalam objek detailQuisioners
            radioButtons.forEach(function(radioButton) {
                var quisionerId = radioButton.getAttribute("name").split("_")[1];
                var satisfactionLevel = radioButton.value;

                detailQuisioners[quisionerId] = satisfactionLevel;
            });

            // Membuat objek data yang akan dikirim ke server
            var data = {
                nama: nama,
                alamat: alamat,
                umur: umur,
                telepon: telepon,
                perusahaan: perusahaan,
                posisi: posisi,
                quisioner: selectedQuisioner,
                detail_quisioner: detailQuisioners
            };

            // Mengirim data ke server menggunakan metode POST dengan Axios
            axios.post("{{ route('landing.store') }}", data)
                .then(function(response) {
                    // Menampilkan pesan sukses jika penyimpanan berhasil
                    alert(response.data.message);

                    // Mereset formulir informasi pribadi
                    informasiForm.reset();
                    kuisionerForm.reset();

                    // Menghapus jawaban kuisioner yang telah dipilih
                    radioButtons.forEach(function(radioButton) {
                        radioButton.checked = false;
                    });

                    // Mengarahkan pengguna ke halaman daftar kuisioner
                    window.location.href = "/";
                })
                .catch(function(error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.log(error);
                });
        });
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
@endsection
