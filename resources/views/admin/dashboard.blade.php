@extends('layout.app')
@section('title', 'Dashboard')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah User</h5>
                                        <h1 class="mb-3 font-35 ">{{ $userCount }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22"> Pengisi Quisioner </h5>
                                        <h2 class="mb-3 font-35">{{ $penyimpananCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Perusahaan</h5>
                                        <h2 class="mb-3 font-35">{{ $perusahaanCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Posisi Terdaftar</h5>
                                        <h2 class="mb-3 font-35">{{ $posisiCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Grafik Pengisian Quisioner Pendaftaran per Bulan (Bar Chart)
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Grafik Pengisian Quisioner per Bulan (Line Chart)
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="form-group">
                        <label for="quisioner">Pilih Quisioner</label>
                        <select class="form-control select2 mx-auto" id="quisioner" name="quisioner"
                            onchange="showQuestion()" style="max-width: 200px;">
                            <option value="">Pilih Quisioner</option>
                            @foreach ($quisioners as $quisioner)
                                <option value="{{ $quisioner->id }}">{{ $quisioner->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-header">
                        Grafik Pengisian Quisioner Pendaftaran per Bulan (Pie Chart)
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var chartData = {!! $chartDataJson !!};
        var months = chartData.map(data => data.month);
        var totals = chartData.map(data => data.total);

        var barChartCtx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(barChartCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Penyimpanan',
                    data: totals,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0,0,0,0.1)',
                            zeroLineColor: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            fontColor: '#666',
                            padding: 10
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0,0,0,0)',
                            zeroLineColor: 'rgba(0,0,0,0)'
                        },
                        ticks: {
                            fontColor: '#666',
                            padding: 10
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Pengisian Quisioner Pendaftaran per Bulan',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });

        var lineChartCtx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(lineChartCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Penyimpanan',
                    data: totals,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0,0,0,0.1)',
                            zeroLineColor: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            fontColor: '#666',
                            padding: 10
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0,0,0,0)',
                            zeroLineColor: 'rgba(0,0,0,0)'
                        },
                        ticks: {
                            fontColor: '#666',
                            padding: 10
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Pengisian Quisioner per Bulan',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
    <script>
        var pieChart = null; // Menyimpan referensi ke objek Chart

        function showQuestion() {
            var quisionerId = $('#quisioner').val();
            $.ajax({
                url: '/get-chart-data/' + quisionerId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    renderPieChart(data);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function renderPieChart(data) {
            // Menghancurkan chart sebelumnya jika ada
            if (pieChart) {
                pieChart.destroy();
            }

            var ctx = document.getElementById('pieChart').getContext('2d');
            pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            data: data.data,
                            backgroundColor: data.backgroundColor
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        var label = context.label || '';
                                        var value = context.raw || 0;
                                        var total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        var percentage = Math.round((value / total) * 100);
                                        return label + ': ' + percentage + '%';
                                    }
                                }
                            },
                            // labels: {
                            //     render: 'percentage',
                            //     fontColor: '#fff',
                            //     precision: 0
                            // }

                        }
                    });

                // Reset the quisionerId value to empty
                $('#quisioner').val('');
            }
    </script>
@endsection
