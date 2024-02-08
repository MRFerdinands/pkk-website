@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button"
                            class="nav-link {{ $errors->has('id_service_motor') || $errors->has('plat_nomor_motor') ? '' : 'active' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home"
                            aria-controls="navs-pills-justified-home" aria-selected="true">
                            <i class="tf-icons bx bxs-car"></i> Mobil
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button"
                            class="nav-link {{ $errors->has('id_service_motor') || $errors->has('plat_nomor_motor') ? 'active' : '' }}"
                            role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile"
                            aria-controls="navs-pills-justified-profile" aria-selected="false">
                            <i class="tf-icons bx bx-cycling"></i> Sepeda Motor
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    {{-- Mobil --}}
                    <div class="tab-pane fade {{ $errors->has('id_service_motor') || $errors->has('plat_nomor_motor') ? '' : 'show active' }}"
                        id="navs-pills-justified-home" role="tabpanel">
                        {{-- <h5 class="card-header">Form Controls</h5> --}}
                        <div class="">
                            <form action="{{ route('prosesdaftarmobil') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="plat_nomor" class="form-label">Plat Nomor
                                    </label>
                                    <select class="form-select" id="plat_nomor" name="plat_nomor"
                                        aria-label="Default select example">
                                    </select>
                                    @if ($errors->has('plat_nomor'))
                                        <div class="alert alert-danger p-1 ps-2" role="alert">
                                            <span class="fw-bold">{{ $errors->first('plat_nomor') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Pendaftar <span
                                            style="color: #ff2e2e;">*</span><span
                                            style="color: #bbbbbb;">(Opsional)</span></label>
                                    <input type="text" class="form-control" name="nama_pelanggan" id="pelanggan"
                                        id="exampleFormControlInput1" placeholder="Isi Nama Pendaftar Antrian" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Merk Kendaraan</label>
                                    <input type="text" class="form-control" name="merk_kendaraan" id="merk"
                                        id="exampleFormControlInput1" placeholder="Contoh Avanza, Xenia, Honda, dll..." />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Jenis Service</label>
                                    <select class="form-select " id="selectService" name="id_service"
                                        aria-label="Default select example">
                                    </select>
                                    @if ($errors->has('id_service'))
                                        <div class="alert alert-danger p-1 ps-2" role="alert">
                                            <span class="fw-bold">{{ $errors->first('id_service') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Biaya Tambahan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" id="biaya_tambahan_mobil"
                                            name="biaya_tambahan" placeholder="Contoh 5000" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="makanan_mobil" class="form-label">Makanan</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control text-black" id="makanan_mobil"
                                                name="biaya_makanan" placeholder="Contoh 5000" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="diskon_mobil" class="form-label">Diskon</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control text-black" id="diskon_mobil"
                                                name="diskon" placeholder="Contoh 20" />
                                            <span class="input-group-text" id="basic-addon1">%</span>
                                        </div>

                                        {{-- <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                                        <input type="number" class="form-control" name="diskon"
                                            id="exampleFormControlInput1" placeholder="Contoh 5000" /> --}}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Total</label>
                                    <h2><span id="selectedValue">Rp 0</span></h2>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Sepeda Motor --}}
                    <div class="tab-pane fade {{ $errors->has('id_service_motor') || $errors->has('plat_nomor_motor') ? 'show active' : '' }}"
                        id="navs-pills-justified-profile" role="tabpanel">
                        {{-- <h5 class="card-header">Form Controls</h5> --}}
                        <div class="">
                            <form action="{{ route('prosesdaftarmotor') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                    <select class="form-select " id="plat_nomor_motor" name="plat_nomor_motor"
                                        aria-label="Default select example">
                                    </select>
                                    @if ($errors->has('plat_nomor_motor'))
                                        <div class="alert alert-danger p-1 ps-2" role="alert">
                                            <span class="fw-bold">{{ $errors->first('plat_nomor_motor') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Pendaftar <span
                                            style="color: #ff2e2e;">*</span><span
                                            style="color: #bbbbbb;">(Opsional)</span></label>
                                    <input type="text" class="form-control" name="nama_pelanggan"
                                        id="pelanggan_motor" id="exampleFormControlInput1"
                                        placeholder="Isi Nama Pendaftar Antrian" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Merk Kendaraan</label>
                                    <input type="text" class="form-control" name="merk_kendaraan" id="merk_motor"
                                        id="exampleFormControlInput1" placeholder="Contoh Vario, Beat, Supra, dll..." />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Jenis Service</label>
                                    <select class="form-select " id="selectServiceMotor" name="id_service_motor"
                                        aria-label="Default select example">
                                    </select>
                                    @if ($errors->has('id_service_motor'))
                                        <div class="alert alert-danger p-1 ps-2" role="alert">
                                            <span class="fw-bold">{{ $errors->first('id_service_motor') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Biaya Tambahan</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" id="biaya_tambahan_motor"
                                            name="biaya_tambahan" placeholder="Contoh 5000" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="makanan_mobil" class="form-label">Makanan</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control text-black" id="makanan_motor"
                                                name="biaya_makanan" placeholder="Contoh 5000" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="diskon_mobil" class="form-label">Diskon</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control text-black" id="diskon_motor"
                                                name="diskon" placeholder="Contoh 20" />
                                            <span class="input-group-text" id="basic-addon1">%</span>
                                        </div>

                                        {{-- <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                                        <input type="number" class="form-control" name="diskon"
                                            id="exampleFormControlInput1" placeholder="Contoh 5000" /> --}}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Total</label>
                                    <h2><span id="selectedValueMotor">Rp 0</span></h2>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            // Mobil
            var biayatmbh = 0,
                makanan = 0,
                diskon = 0,
                totaldiskon = 0,
                harga = 0,
                total = 0;
            var selectedValueSpan = document.getElementById("selectedValue");
            var merk = document.getElementById("merk");
            var pelanggan = document.getElementById("pelanggan");
            var $biaya_ms = $("#biaya_tambahan_mobil").on("input", function() {
                biayatmbh = parseInt($biaya_ms.val()) || 0;
                total = biayatmbh + harga + makanan;
                selectedValueSpan.textContent = formatRupiah(total - totaldiskon);
            });
            var $biaya_m = $("#makanan_mobil").on("input", function() {
                makanan = parseInt($biaya_m.val()) || 0;
                total = biayatmbh + harga + makanan;
                selectedValueSpan.textContent = formatRupiah(total - totaldiskon);
            });
            var $diskon_m = $("#diskon_mobil").on("input", function() {
                diskon = parseInt($diskon_m.val()) || 0;
                totaldiskon = (total * diskon) / 100;
                total = biayatmbh + harga + makanan;
                selectedValueSpan.textContent = formatRupiah(total - totaldiskon);
            });
            $('#selectService').on('change', function() {
                harga = parseInt($(this).select2('data')[0].item_harga) || 0;
                total = biayatmbh + harga;
                selectedValueSpan.textContent = formatRupiah(total);
            });
            $("#plat_nomor").select2({
                theme: "bootstrap-5",
                tags: true,
                placeholder: 'Plat Nomor',
                ajax: {
                    url: "{{ route('selectplatnomormobil.s') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.plat_nomor,
                                    value: item.plat_nomor,
                                    text: item.plat_nomor + " • " + item.merk_kendaraan,
                                    merk: item.merk_kendaraan,
                                    pelanggan: item.nama_pelanggan,
                                }
                            })
                        }
                    }
                }
            });
            $('#plat_nomor').on('change', function() {
                // harga = parseInt($(this).select2('data')[0].item_harga) || 0;
                // total = biayatmbh + harga;
                if (!!$(this).select2('data')[0].merk) {
                    merk.value = $(this).select2('data')[0].merk;
                    merk.disabled = false
                } else {
                    merk.value = "";
                    merk.disabled = false
                }
                if (!!$(this).select2('data')[0].pelanggan) {
                    pelanggan.value = $(this).select2('data')[0].pelanggan;
                    pelanggan.disabled = false
                } else {
                    pelanggan.value = "";
                    pelanggan.disabled = false
                }
            });
            $("#selectService").select2({
                theme: "bootstrap-5",
                placeholder: 'Pilih Service',
                ajax: {
                    url: "{{ route('selectservicemobil.s') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    value: item.id,
                                    text: item.nama + " • " + formatRupiah(item.harga),
                                    item_harga: item.harga,
                                }
                            })
                        }
                    }
                }
            });
            // Motor
            var biayatmbh_motor = 0,
                makanan_motor = 0,
                diskon_motor = 0,
                totaldiskon_motor = 0,
                harga_motor = 0,
                total_motor = 0;
            var selectedValueSpan_motor = document.getElementById("selectedValueMotor");
            var merk_motor = document.getElementById("merk_motor");
            var pelanggan_motor = document.getElementById("pelanggan_motor");
            var $biaya_t = $("#biaya_tambahan_motor").on("input", function() {
                biayatmbh_motor = parseInt($biaya_t.val()) || 0;
                total_motor = biayatmbh_motor + harga_motor + makanan_motor;
                selectedValueSpan_motor.textContent = formatRupiah(total_motor - totaldiskon_motor);
            });
            var $makanan_t = $("#makanan_motor").on("input", function() {
                makanan_motor = parseInt($makanan_t.val()) || 0;
                total_motor = biayatmbh_motor + harga_motor + makanan_motor;
                selectedValueSpan_motor.textContent = formatRupiah(total_motor - totaldiskon_motor);
            });
            var $diskon_t = $("#diskon_motor").on("input", function() {
                diskon_motor = parseInt($diskon_t.val()) || 0;
                totaldiskon_motor = (total_motor * diskon_motor) / 100;
                total_motor = biayatmbh_motor + harga_motor + makanan_motor;
                selectedValueSpan_motor.textContent = formatRupiah(total_motor - totaldiskon_motor);
            });
            $('#selectServiceMotor').on('change', function() {
                harga_motor = parseInt($(this).select2('data')[0].item_harga_motor) || 0;
                total_motor = biayatmbh_motor + harga_motor;
                selectedValueSpan_motor.textContent = formatRupiah(total_motor);
            });
            $('#plat_nomor_motor').on('change', function() {
                if (!!$(this).select2('data')[0].merk) {
                    merk.value = $(this).select2('data')[0].merk;
                    merk.disabled = true
                } else {
                    merk.value = "";
                    merk.disabled = false
                }
                if (!!$(this).select2('data')[0].pelanggan) {
                    pelanggan.value = $(this).select2('data')[0].pelanggan;
                    pelanggan.disabled = true
                } else {
                    pelanggan.value = "";
                    pelanggan.disabled = false
                }
            });
            $("#plat_nomor_motor").select2({
                theme: "bootstrap-5",
                tags: true,
                placeholder: 'Plat Nomor',
                ajax: {
                    url: "{{ route('selectplatnomormotor.s') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.plat_nomor,
                                    value: item.plat_nomor,
                                    text: item.plat_nomor + " • " + item.merk_kendaraan,
                                    merk: item.merk_kendaraan,
                                    pelanggan: item.nama_pelanggan,
                                }
                            })
                        }
                    }
                }
            });
            $("#selectServiceMotor").select2({
                theme: "bootstrap-5",
                placeholder: 'Pilih Service',
                ajax: {
                    url: "{{ route('selectservicemotor.s') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    value: item.id,
                                    text: item.nama + " • " + formatRupiah(item.harga),
                                    item_harga_motor: item.harga,
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
@endpush
