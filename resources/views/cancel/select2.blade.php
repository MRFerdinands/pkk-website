@extends('layouts.main')

@section('contents')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-1">
            <div class="px-2 py-2">
                <div class='mb-2'>
                    <label> Service</label>
                    <select id="selectService" class="form-select" aria-label="Default select example">

                    </select>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#selectService").select2({
                placeholder: 'Pilih Service',
                ajax: {
                    url: "{{ route('selectservice.s') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
@endpush
