@extends('layout.applanding')
@section('title', 'Landing Page')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="container">
                    <h2>Informasi Pribadi</h2>
                    <form>
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
                            <label for="pekerjaan">Sebagai Apa:</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
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
                            <select class="form-control" id="quisioner" name="quisioner" onchange="showQuestion()">
                                @foreach ($quisioners as $quisioner)
                                    <option value="{{ $quisioner->id }}">{{ $quisioner->nama }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Pilih</button>
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
                                <tbody>
                                    @foreach ($detailquisioners as $index => $item)
                                        <tr>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="satisfaction_{{ $index }}"
                                                    value="1">
                                            </td>
                                            <td>
                                                <input type="radio" name="satisfaction_{{ $index }}"
                                                    value="2">
                                            </td>
                                            <td>
                                                <input type="radio" name="satisfaction_{{ $index }}"
                                                    value="3">
                                            </td>
                                            <td>
                                                <input type="radio" name="satisfaction_{{ $index }}"
                                                    value="4">
                                            </td>
                                            <td>
                                                <input type="radio" name="satisfaction_{{ $index }}"
                                                    value="5">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center">
                <span class="mr-2">Submit</span>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- Mengimpor Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function showQuestion() {
            var dropdown = document.getElementById("quisioner");
            var questionContainer = document.getElementById("questionContainer");
            var selectedOption = dropdown.options[dropdown.selectedIndex];
            var question = selectedOption.text; // Mendapatkan teks pertanyaan dari opsi yang dipilih

            // Mengganti konten pada questionContainer dengan pertanyaan
            questionContainer.innerHTML = "<h4>" + question + "</h4>";
        }
    </script>
@endsection
