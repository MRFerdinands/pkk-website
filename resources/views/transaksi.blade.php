@extends('layouts.main')

@section('contents')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- List group with Badges & Pills -->
        <div class="card p-2 d-flex ps-3 mb-2">
            <!-- Search -->
            <div class="d-flex align-items-center ">
                <i class="bx bx-search fs-4 lh-0"></i>
                <form action="/transaksi" method="GET" class="w-100">
                    <input type="search" name="search" class="form-control border-0 shadow-none" placeholder="Search..."
                        aria-label="Search..." />
                </form>
            </div>
            <!-- /Search -->

        </div>
        {{-- Mobile --}}
        <div class="d-lg-none">
            @if ($data->isEmpty())
                <div class="card">
                    <div class="alert alert-warning mx-3 mt-3" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data
                        Yang
                        Di
                        Tampilkan!</div>
                </div>
            @else
                @foreach ($data as $row)
                    <div class="card mt-3">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-body ">
                                <div class="d-flex justify-content-between gap-2 text-white ">
                                    {{-- <span class="fs-5 text-black ">ID: {{ $row->id }}</span> --}}
                                    <span class="fs-5 text-black ">Plat: {{ $row->plat_nomor }}
                                        • {{ $row->kendaraan }}</span>
                                </div>
                                <div class="d-flex">
                                    {{-- <a href="/edittransaksimobil/{{ $row->id }}" class="btn btn-icon btn-primary">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </a> --}}
                                    <a data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"
                                        class="btn btn-icon btn-danger ms-2 delete text-white">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </div>
                            </li>
                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Plat Nomor:</span>
                                <span>{{ $row->plat_nomor }}</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Tgl:</span>
                                <span>{{ $row->created_at->format('H:i • j M Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Nama Pelanggan:</span>
                                <span>{{ $row->nama_pelanggan }}</span>
                            </li>
                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Kendaraan:</span>
                                <span>{{ $row->kendaraan }}</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Merk Kendaraan:</span>
                                <span>{{ $row->merk_kendaraan }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Nama Service:</span>
                                <span>{{ $row->services->nama }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Harga Service:</span>
                                <span>
                                    @php
                                        echo 'Rp ' . number_format($row->services->harga, 0, ',', '.');
                                    @endphp
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Biaya Tambahan:</span>
                                <span>
                                    @php
                                        echo 'Rp ' . number_format($row->biaya_tambahan, 0, ',', '.');
                                    @endphp
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Biaya Makanan:</span>
                                <span>
                                    @php
                                        echo 'Rp ' . number_format($row->biaya_makanan, 0, ',', '.');
                                    @endphp
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Diskon:</span>
                                <span>
                                    {{ $row->diskon }} %
                                </span>
                            </li>
                            <li
                                class="list-group-item bg-opacity-25 text-white bg-success d-flex justify-content-between align-items-center fs-5">
                                <span class="">Total:</span>
                                <span>
                                    @php
                                        echo 'Rp ' . number_format($row->total, 0, ',', '.');
                                    @endphp
                                </span>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
        {{-- Desktop --}}
        <div class="d-none d-lg-block">
            <div class="col-lg-12">
                @if ($data->isEmpty())
                    <div class="card">
                        <div class="alert alert-warning mx-3 mt-3" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data
                            Yang
                            Di
                            Tampilkan!</div>
                    </div>
                @else
                    @foreach ($data as $row)
                        <div class="card mb-2">
                            <div class="list-group bg-white ">
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex justify-content-between w-100">
                                        <p class="fw-bold">
                                            <span># </span>
                                            {{ $row->id }}
                                        </p>
                                        <small class="fw-bold">{{ $row->created_at->format('H:i • j M Y') }}</small>
                                    </div>
                                    <p>
                                        <span class="fw-bold">Plat Nomor: </span>
                                        {{ $row->plat_nomor }}
                                        <br>
                                        <span class="fw-bold">Nama Pelanggan: </span>
                                        {{ $row->nama_pelanggan }}
                                        <br>
                                        <span class="fw-bold">Kendaraan: </span>
                                        {{ $row->kendaraan }}
                                        <br>
                                        <span class="fw-bold">Merk: </span>
                                        {{ $row->merk_kendaraan }}
                                        <br>
                                        <span class="fw-bold">Biaya Tambahan: </span>
                                        @php
                                            echo 'Rp ' . number_format($row->biaya_tambahan, 0, ',', '.');
                                        @endphp
                                        <br>
                                        <span class="fw-bold">Biaya Makanan: </span>
                                        @php
                                            echo 'Rp ' . number_format($row->biaya_makanan, 0, ',', '.');
                                        @endphp
                                        <br>
                                        <span class="fw-bold">Diskon: </span>
                                        {{ $row->diskon }} %
                                        <br>
                                        <span class="fw-bold">Nama Service: </span>
                                        {{ $row->services->nama }}
                                        @php
                                            echo ' • Rp ' . number_format($row->services->harga, 0, ',', '.');
                                        @endphp
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                        <div class="d-flex">
                                            <div class="bg-success text-white p-2 rounded-2 ">
                                                <span class="fw-bold">Total: </span>
                                                @php
                                                    echo 'Rp ' . number_format($row->total, 0, ',', '.');
                                                @endphp
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2">
                                            {{-- <a href="/edittransaksimobil/{{ $row->id }}" class="btn btn-primary">
                                            <span class="tf-icons bx bx-edit-alt"> </span>
                                            Edit
                                        </a> --}}
                                            <a data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"
                                                class="btn btn-danger delete text-white">
                                                <span class="tf-icons bx bx-trash"> </span>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="mt-3">
            {{ $data->onEachSide(2)->links() }}
        </div>

    </div>
@stop

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete').click(function() {
            var nama = $(this).attr('data-nama');
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Yakin?",
                icon: "question",
                text: "Kamu akan menghapus data \"" + nama + "\"",
                showDenyButton: true,
                confirmButtonText: "Ya",
                denyButtonText: `Tidak`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = "/deletetransaksimobil/" + id;
                    Swal.fire("Data di hapus!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Data tidak di hapus!", "", "info");
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endpush
