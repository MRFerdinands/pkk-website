@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Jenis User</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('updateuser', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col mb-2">
                                <label for="nameWithTitle" class="form-label">Username</label>
                                <input type="text" id="nameWithTitle" name="name" value="{{ $data->name }}"
                                    class="form-control" placeholder="Contoh Full Body" />
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger p-1 ps-2 mb-0" role="alert">
                                        <span class="fw-bold">{{ $errors->first('name') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ $data->email }}"
                                    class="form-control" placeholder="Contoh example@gmail.com" />
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger p-1 ps-2 mb-0" role="alert">
                                        <span class="fw-bold">{{ $errors->first('email') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Contoh *****" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select" id="role">
                                    <option selected disabled value="">Pilih Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                @if ($errors->has('role'))
                                    <div class="alert alert-danger p-1 ps-2 mb-0" role="alert">
                                        <span class="fw-bold">{{ $errors->first('role') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="mt-3">
                                <a href="{{ route('user') }}" class="btn btn-secondary text-white">Cancel</a>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success text-white ">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
