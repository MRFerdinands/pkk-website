@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Transaksi</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('updatetransaksimobil', $data->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="plat_nomor" class="form-label">Plat Nomor</label>
                            <select class="form-select " id="plat_nomor" name="plat_nomor"
                                aria-label="Default select example">
                                <option value="{{ $data->plat_nomor }}">{{ $data->plat_nomor }} •
                                    {{ $data->merk_kendaraan }}</option>
                            </select>
                            {{-- <input type="text" class="form-control" name="plat_nomor" id="plat_nomor"
                                placeholder="Contoh W 1080 NCK" /> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Pendaftar <span
                                    style="color: #ff2e2e;">*</span><span style="color: #bbbbbb;">(Opsional)</span></label>
                            <input type="text" class="form-control" name="nama_pelanggan"
                                value="{{ $data->nama_pelanggan }}" id="pelanggan"
                                placeholder="Isi Nama Pendaftar Antrian" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Merk Kendaraan</label>
                            <input type="text" class="form-control" name="merk_kendaraan" id="merk"
                                value="{{ $data->merk_kendaraan }}" placeholder="Contoh Avanza, Xenia, Honda, dll..." />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Biaya Tambahan</label>
                            <input type="number" class="form-control" value="{{ $data->biaya_tambahan }}"
                                id="biaya_tambahan_mobil" name="biaya_tambahan" placeholder="Contoh 5000" />
                            {{-- <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Biaya Tambahan</label>
                                    <input type="text" class="form-control" id="biaya_tambahan"
                                        name="biaya_tambahan" id="exampleFormControlInput1"
                                        placeholder="Contoh 5000" />
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Biaya Tambahan</label>
                                    <input type="number" class="form-control" id="ss" name="biaya_tambahan"
                                        id="exampleFormControlInput1" placeholder="Contoh 5000" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Pilih Jenis Service</label>
                            <select class="form-select " id="selectService" name="id_service"
                                aria-label="Default select example">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Total</label>
                            <h2><span id="selectedValue">Rp {{ $data->total }}</span></h2>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        function formatRupiah(number) {
            var rupiah = '';
            var numberString = number.toString();
            for (var i = numberString.length - 1; i >= 0; i--) {
                rupiah = numberString[i] + rupiah;
                if ((numberString.length - i) % 3 === 0 && i !== 0) {
                    rupiah = '.' + rupiah;
                }
            }
            return 'Rp ' + rupiah;
        }
        $(document).ready(function() {
            // Mobil
            var biayatmbh = 0,
                harga = 0,
                total = 0;
            var selectedValueSpan = document.getElementById("selectedValue");
            var merk = document.getElementById("merk");
            var pelanggan = document.getElementById("pelanggan");
            var $sss = $("#biaya_tambahan_mobil").on("input", function() {
                biayatmbh = parseInt($sss.val()) || 0;
                total = biayatmbh + harga;
                selectedValueSpan.textContent = formatRupiah(total);
            });
            $('#selectService').on('change', function() {
                harga = parseInt($(this).select2('data')[0].item_harga) || 0;
                total = biayatmbh + harga;
                selectedValueSpan.textContent = formatRupiah(total);
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
            // $("#plat_nomor").val({{ $data->plat_nomor }}).trigger("change");
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
            $("#plat_nomor").on('select2:close', function(e) {
                var selectedData = $(this).select2('data');
                var lastItem = selectedData[selectedData.length - 1];

                // If the last item is a new option, clear the input
                if (lastItem && lastItem.id === lastItem.text) {
                    $(this).val('').trigger('change');
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
        });
    </script>
@endpush
