@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <phone-list></phone-list>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" defer>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('.select2').select2();
        });
    </script>
@endpush
