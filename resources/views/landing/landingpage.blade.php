<!DOCTYPE html>
<html>

<head>
    <title>Form Kepuasan Pelanggan</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- CSS sendiri -->
    <link rel="stylesheet" href="{{ asset('landingasset/css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('landingasset/img/Polije.png') }}" alt="Logo 1" width="30" height="30"
                    class="d-inline-block align-top">
                <img src="{{ asset('landingasset/img/Sip.png') }}" alt="Logo 2" width="90" height="30"
                    class="d-inline-block align-top">
                <img src="{{ asset('landingasset/img/Blu.png') }}" alt="Logo 3" width="30" height="30"
                    class="d-inline-block align-top">
                <span class="ml-3">Form Kuisioner</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                    <form>
                        <div class="form-group">
                            <label for="quisioner">Quisioner:</label>
                            <select class="form-control" id="quisioner" name="quisioner">
                                @foreach ($quisioners as $quisioner)
                                    <option value="{{ $quisioner->id }}">{{ $quisioner->nama }}</option>
                                @endforeach
                            </select>
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
                                    <tr>
                                        <td>Sangat Tidak Puas</td>
                                        <td>
                                            <input type="radio" name="satisfaction" value="1">
                                        </td>
                                        <td>
                                            <input type="radio" name="satisfaction" value="2">
                                        </td>
                                        <td>
                                            <input type="radio" name="satisfaction" value="3">
                                        </td>
                                        <td>
                                            <input type="radio" name="satisfaction" value="4">
                                        </td>
                                        <td>
                                            <input type="radio" name="satisfaction" value="5">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mengimpor Bootstrap JS dan dependensinya -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
