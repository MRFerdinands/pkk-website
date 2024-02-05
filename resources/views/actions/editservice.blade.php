@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Jenis Service</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('updateservice', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="tipekendaraan" class="form-label">Tipe Kendaraan</label>
                                <select name="tipekendaraan" class="form-select" id="tipekendaraan">
                                    <option selected disabled value="">Pilih Tipe Kendaraan</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                                    <option value="Lain">Lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="nameWithTitle" class="form-label">Nama Service</label>
                                <input type="text" id="nameWithTitle" name="nama" value="{{ $data->nama }}"
                                    class="form-control" placeholder="Contoh Full Body" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" id="harga" name="harga" value="{{ $data->harga }}"
                                    class="form-control" placeholder="Contoh 4000" />
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="mt-3">
                                <a href="{{ route('tipeservice') }}" class="btn btn-secondary text-white">Cancel</a>
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
