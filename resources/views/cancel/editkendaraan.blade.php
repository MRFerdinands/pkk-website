@extends('layouts.main')

@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Jenis Kendaraan</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <form action="{{ route('updatekendaraan', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col mb-2">
                                <label for="nameWithTitle" class="form-label">Nama Kendaraan</label>
                                <input type="text" id="nameWithTitle" name="nama" value="{{ $data->nama }}"
                                    class="form-control" placeholder="Contoh Full Body" />
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="mt-3">
                                <a href="{{ route('tipekendaraan') }}" class="btn btn-secondary text-white">Cancel</a>
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
