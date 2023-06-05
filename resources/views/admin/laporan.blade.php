@extends('layout.app')

@section('title', 'Data Detail Penyimpanan')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Penilaian Pelanggan</h4>
                            <br>

                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="quisioner">Pilih Quisioner</label>
                                <select class="form-control select2" id="quisioner" name="quisioner"
                                    onchange="showQuestion()">
                                    <option value="">Pilih Quisioner</option>
                                    @foreach ($quisioners as $quisioner)
                                        <option value="{{ $quisioner->id }}">{{ $quisioner->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Jenis Pertanyaan</th>
                                            <th class="text-center">1</th>
                                            <th class="text-center">2</th>
                                            <th class="text-center">3</th>
                                            <th class="text-center">4</th>
                                            <th class="text-center">5</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataDetail">
                                        {{-- Data Detail Penyimpanan akan ditampilkan di sini --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Perhitungan Index Aspek</h4>
                            <br>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Jenis Pertanyaan</th>
                                            <th class="text-center">1</th>
                                            <th class="text-center">2</th>
                                            <th class="text-center">3</th>
                                            <th class="text-center">4</th>
                                            <th class="text-center">5</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Index</th>
                                            <th class="text-center">Kepuasan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataDetail2">
                                        {{-- Data Detail Penyimpanan 2 akan ditampilkan di sini --}}
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
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        function showQuestion() {
            var quisionerId = $('#quisioner').val();

            if (quisionerId) {
                $.ajax({
                    url: '/get-detail-penyimpanan/' + quisionerId,
                    type: 'GET',
                    success: function(response) {
                        // Kosongkan konten sebelumnya
                        $('#dataDetail').empty();
                        $('#dataDetail2').empty();
                        var count = 1;
                        // Tampilkan data detail penyimpanan yang baru
                        $.each(response, function(index, detail) {
                            var row = '<tr>' +
                                '<td class="text-center">' + count++ + '</td>' +
                                '<td>' + index + '</td>' +
                                '<td class="text-center">' + detail.pilihan_1 + '</td>' +
                                '<td class="text-center">' + detail.pilihan_2 + '</td>' +
                                '<td class="text-center">' + detail.pilihan_3 + '</td>' +
                                '<td class="text-center">' + detail.pilihan_4 + '</td>' +
                                '<td class="text-center">' + detail.pilihan_5 + '</td>' +
                                '<td class="text-center">' + calculateTotal(detail) + '</td>' +
                                '</tr>';

                            function calculateTotal(detail) {
                                var total = detail.pilihan_1 + detail.pilihan_2 + detail.pilihan_3 +
                                    detail.pilihan_4 + detail.pilihan_5;
                                return total;
                            }

                            var row2 = '<tr>' +
                                '<td class="text-center">' + count++ + '</td>' +
                                '<td>' + index + '</td>' +
                                '<td class="text-center">' + (detail.pilihan_1 * 5) + '</td>' +
                                '<td class="text-center">' + (detail.pilihan_2 * 4) + '</td>' +
                                '<td class="text-center">' + (detail.pilihan_3 * 3) + '</td>' +
                                '<td class="text-center">' + (detail.pilihan_4 * 2) + '</td>' +
                                '<td class="text-center">' + (detail.pilihan_5 * 1) + '</td>' +
                                '<td class="text-center">' + calculateTotal2(detail) + '</td>' +
                                '<td class="text-center">' + (calculateTotal2(detail) / calculateTotal(
                                    detail)).toFixed(2) + '</td>' +
                                '<td class="text-center">' + ((detail.pilihan_5 + detail.pilihan_4 +
                                    detail.pilihan_3) / calculateTotal(detail) * 100).toFixed(2) + '%' +
                                '</td>' +
                                '</tr>';

                            function calculateTotal2(detail) {
                                var total = (detail.pilihan_1 * 5) + (detail.pilihan_2 * 4) + (detail
                                        .pilihan_3 * 3) +
                                    (detail.pilihan_4 * 2) + (detail.pilihan_5 * 1);
                                return total;
                            }

                            $('#dataDetail').append(row);
                            $('#dataDetail2').append(row2);
                        });

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                // Kosongkan konten jika tidak ada quisioner yang dipilih
                $('#dataDetail').empty();
                $('#dataDetail2').empty();
            }
        }
    </script>
@endsection
