@extends('layout.admin.index')

@section('content')
    {{-- Service section --}}
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1 mb-2 text-capitalize">Services data</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                Services DataTable
            </div>
            <div class="card-body">
                <table id="servicesTable">
                    <thead>
                        <tr>
                            <th>Service name</th>
                            <th>Brief Description</th>
                            <th>Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display all projects --}}
                        @foreach ($services as $services)
                            <tr>
                                <td>{{ $services->name }}</td>
                                <td>
                                    {{ Str::limit($services->description, 40) }}
                                </td>
                                <td>{{ Str::limit($services->details, 40) }}</td>
                                <td>
                                    {{ $services->image }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('services.edit', $services->id) }}"
                                                    class="dropdown-item">Edit</a></li>
                                            <li>
                                                <form action="{{ route('services.destroy', $services->id) }}" class="w-100"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 px-4">
        {{-- notification --}}
        @include('Admin.components.errors.notifications')
        <div class="text-success fs-1">Upload Company services for site!</div>
        @include('Admin.components.forms.services')
    </div>
@endsection

@section('scripts')
    {{-- CKEDITOR --}}
    <script>
        CKEDITOR.replace('details');
    </script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="serviceimage"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        // store the filepond instance
        FilePond.setOptions({
            server: {
                url: '{{ route('upload') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        });
    </script>
@endsection
