@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1">Upload Company services for site!</div>
        @include('Admin.components.forms.services')
    </div>
@endsection

@section('scripts')
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="serviceimage"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        // store the filepond instance
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        });
    </script>
@endsection
