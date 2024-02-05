@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            @if ($data->isEmpty())
                <div class="col-lg-12 mt-3">
                    <div class="alert alert-warning" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data Yang Di
                        Tampilkan!</div>
                </div>
            @else
                <!-- Custom content with heading -->
                <div class="col-lg-12">
                    @foreach ($data as $row)
                        <div class="mb-3">
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
                                    </p>
                                    {{-- <div class="d-flex flex-column">
                                        <small class=""><i class='bx bxs-trash-alt'></i> Kebersihan :
                                            {{ $row->kebersihan }} <i class='bx bxs-user-voice'></i> Keramahan :
                                            {{ $row->keramahan }} <i class='bx bxs-search-alt-2'></i> Ketelitian :
                                            {{ $row->ketelitian }}</small>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--/ Custom content with heading -->
            @endif
        </div>
    </div>
@stop
