@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="">
            @if ($data->isEmpty())
                <div class="card px-3">
                    <div class="col-lg-12 mt-3">
                        <div class="alert alert-warning" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data Yang Di
                            Tampilkan!</div>
                    </div>
                </div>
            @else
                <!-- Custom content with heading -->
                <div class="col-lg-12">
                    @foreach ($data as $row)
                        <div class="card mb-2">
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalCenter{{ $row->id }}"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex justify-content-between w-100">
                                    <h6>{{ Str::limit($row->nama, 22, '...') }}</h6>
                                    <small class="text-muted">{{ $row->created_at->format('H:i • j M Y') }}</small>
                                </div>
                                <p class="mb-1">
                                    {{ Str::limit($row->pesan, 100, '...') }}
                                </p>
                                <small class="text-info border-info border-bottom ">Detail</small>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter{{ $row->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Informasi Kritik Saran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div> --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- <div class="divider text-center">
                                                        <div class="divider-text">Informasi</div>
                                                    </div> --}}
                                                    <h6 class="fw-bold text-body text-center">
                                                        <span class="fs-4">{{ $row->nama }}</span><br>
                                                        <span class="fs-6">{{ $row->email }}</span>
                                                    </h6>
                                                    <div class="divider">
                                                        <div class="divider-text">Pesan</div>
                                                    </div>
                                                    <p class="fw-bold">{{ $row->pesan }}</p>
                                                    <div class="divider">
                                                        <div class="divider-text">Poin</div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <div class="col-4 ">
                                                            <i class='bx bxs-trash'></i>
                                                            {{ $row->kebersihan }}
                                                        </div>
                                                        <div class="col-4 ">
                                                            <i class='bx bxs-user-voice'></i>
                                                            {{ $row->keramahan }}
                                                        </div>
                                                        <div class="col-4 ">
                                                            <i class='bx bxs-search-alt-2'></i>
                                                            {{ $row->ketelitian }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a class="btn btn-danger text-white delete" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter{{ $row->id }}"
                                                data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-sm-12 col-lg-12 mb-3">
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
                        </div> --}}

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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete').click(function() {
            var nama = $(this).attr('data-nama');
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Yakin?",
                icon: "question",
                text: "Kamu akan menghapus kritik saran dari \"" + nama + "\"",
                showDenyButton: true,
                confirmButtonText: "Ya",
                denyButtonText: `Tidak`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = "/deleterating/" + id;
                    Swal.fire("Data di hapus!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Data tidak di hapus!", "", "info");
                }
            });
        });
    </script>
@endpush
