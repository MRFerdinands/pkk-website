@extends('layouts.main')

@section('contents')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-1">
            <div class="px-2 py-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    Tambah User
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('tambahuser') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Username</label>
                                            <input type="text" id="nameWithTitle" name="name" class="form-control"
                                                placeholder="Contoh John" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="harga" class="form-label">Email</label>
                                            <input type="text" id="harga" name="email" class="form-control"
                                                placeholder="Contoh email@email.com" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="harga" class="form-label">Password</label>
                                            <input type="password" id="harga" name="password" class="form-control"
                                                placeholder="********" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" class="form-select" id="role">
                                                <option selected disabled value="">Pilih Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List group with Badges & Pills -->
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
                    <div class="card mt-2">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-body ">
                                <div class="d-flex justify-content-between gap-2 text-white">
                                    <span class="fs-5 text-black ">ID: {{ $row->id }}</span>
                                </div>
                                <div class="d-flex">
                                    <a href="/edituser/{{ $row->id }}" class="btn btn-icon btn-primary">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </a>
                                    <a data-nama="{{ $row->name }}" data-id="{{ $row->id }}"
                                        class="btn btn-icon btn-danger ms-2 delete text-white">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Username:</span>
                                <span>{{ $row->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Email:</span>
                                <span>{{ $row->email }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5">
                                <span class="">Role:</span>
                                <span>{{ $row->role }}</span>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
        <!--/ List group with Badges & Pills -->

        <div class="card d-none d-lg-block">
            <div class="table-responsive text-nowrap">
                @if ($data->isEmpty())
                    <div class="alert alert-warning mx-3 mt-3" role="alert"><i class='bx bxs-data'></i> Tidak Ada Data
                        Yang Di Tampilkan!
                    </div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('edituser', $row->id) }}"><i
                                                        class="bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item delete" data-nama="{{ $row->name }}"
                                                    data-id="{{ $row->id }}"><i class="bx bx-trash me-2"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection


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
                    window.location = "/deleteuser/" + id;
                    Swal.fire("Data di hapus!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Data tidak di hapus!", "", "info");
                }
            });
        });
    </script>
@endpush
