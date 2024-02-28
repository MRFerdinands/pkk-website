@extends('layouts.main')

@section('contents')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-body p-0 pt-3 px-3">
                        <div class="card-title d-flex align-items-start align-items-center  gap-2">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assetss/img/icons/unicons/chart-success.png') }}" alt="chart success"
                                    class="rounded" />
                            </div>
                            <span class="fw-semibold d-block fs-5">Pendapatan Hari {{ $namaHari }}</span>
                        </div>
                        <span class="fw-semibold d-block">{{ $totalPendaftaranHariIni }} Pendaftaran</span>
                        <h3 class="card-title">Rp {{ number_format($totalPendapatanHariini, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-body p-0 pt-3 px-3">
                        <div class="card-title d-flex align-items-start align-items-center  gap-2">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assetss/img/icons/unicons/cc-primary.png') }}" alt="chart success"
                                    class="rounded" />
                            </div>
                            <span class="fw-semibold d-block fs-5">Pendapatan Bulan {{ $namaBulan }}</span>
                        </div>
                        <span class="fw-semibold d-block">{{ $totalPendaftaranBulanIni }} Pendaftaran</span>
                        <h3 class="card-title">Rp {{ number_format($totalPendapatanBulanIni, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-body p-0 pt-3 px-3">
                        <div class="card-title d-flex align-items-start align-items-center  gap-2">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assetss/img/icons/unicons/wallet-info.png') }}" alt="chart success"
                                    class="rounded" />
                            </div>
                            <span class="fw-semibold d-block fs-5">Pendapatan Tahun {{ $tahunIni }} </span>
                        </div>
                        <span class="fw-semibold d-block">{{ $totalPendaftaranTahunIni }} Pendaftaran</span>
                        <h3 class="card-title">Rp {{ number_format($totalPendapatanTahunIni, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body p-0 pt-3 px-3">
                        <div class="card-title d-flex align-items-start align-items-center  gap-2">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assetss/img/icons/unicons/wallet-info.png') }}" alt="chart success"
                                    class="rounded" />
                            </div>
                            <span class="fw-semibold d-block fs-5">Total Pendapatan</span>
                        </div>
                        <span class="fw-semibold d-block">{{ $totalPendaftaran }} Pendaftaran</span>
                        <h3 class="card-title">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 order-1">
                <div class="card p-3">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var optionsPendaftaran = {!! json_encode($chartData) !!};

        optionsPendaftaran.xaxis.categories = [
            'Januari', 'Februari', 'Maret', 'April', 'M ei', 'Juni',
            'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        optionsPendaftaran.yaxis = {
            labels: {
                formatter: function(value) {
                    return value;
                }
            },
        };
        var chart = new ApexCharts(document.querySelector("#chart"), optionsPendaftaran);
        chart.render();
    </script>
@endpush
