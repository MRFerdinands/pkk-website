@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="">
            @if ($data->isEmpty())
                <div class="card">
                    <div class="col-lg-12 mt-3 mx-3">
                        <div class="alert alert-warning" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data Yang Di
                            Tampilkan!</div>
                    </div>
                </div>
            @else
                <!-- Custom content with heading -->
                <div class="col-lg-12">
                    @foreach ($data as $row)
                        <div class="col-sm-12 col-lg-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex align-items-center gap-1"><i
                                            class='bx bxs-user-circle'></i>
                                        {{ $row->nama }}</h5>
                                    <h6 class="card-title d-flex align-items-center gap-1"><i class='bx bx-envelope'></i>
                                        {{ $row->email }}</h6>
                                    <p class="card-text">
                                        <i class='bx bxs-message-dots'></i>
                                        {{ $row->pesan }}
                                    </p>
                                    <p class="card-text d-flex align-items-center gap-1">
                                        <i class='bx bxs-trash'></i>
                                        {{ $row->kebersihan }}
                                        <i class='bx bxs-user-voice'></i>
                                        {{ $row->keramahan }}
                                        <i class='bx bxs-search-alt-2'></i>
                                        {{ $row->ketelitian }}
                                    </p>
                                    <p class="card-text"><small class="text-muted">Di Kirim
                                            {{ $row->created_at->format('j M Y H:i') }}</small></p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mb-3 mt-3">
                            <div class="list-group bg-white p-0">
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex justify-content-end w-100">
                                        <small class="text-muted">{{ $row->created_at->format('j M Y') }}</small>
                                    </div>
                                    <p>
                                        <span class="fw-bold">Nama :</span> {{ $row->nama }}
                                        <br>
                                        <span class="fw-bold">Email :</span> {{ $row->email == '' ? '-' : $row->email }}
                                        <br>
                                        <span class="fw-bold">Pesan :</span> {{ $row->pesan }}
                                        <br>
                                        <span class="fw-bold">Point : <small class=""><i class='bx bxs-trash-alt'></i>
                                                Kebersihan
                                                {{ $row->kebersihan }} • <i class='bx bxs-user-voice'></i> Keramahan
                                                {{ $row->keramahan }} • <i class='bx bxs-search-alt-2'></i> Ketelitian
                                                {{ $row->ketelitian }}</small>
                                        </span>
                                        <button class="btn btn-danger float-end ">Delete</button>
                                    </p>
                                    <div class="d-flex justify-content-end w-100">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
                <!--/ Custom content with heading -->
            @endif
        </div>
    </div>
@stop
