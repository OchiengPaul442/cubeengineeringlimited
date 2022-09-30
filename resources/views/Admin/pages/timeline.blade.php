@extends('layout.admin.index')

@section('content')
    {{-- timeline --}}
    <div class="container-fluid mt-4 px-4">        
        {{-- notification --}}
        @include('Admin.components.errors.notifications')
        <div class="text-success fs-1 mb-2 text-capitalize">Timeline data</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                Timeline DataTable
            </div>
            <div class="card-body">
                <table id="messagesTable">
                    <thead>
                        <tr>
                            <th>Quote</th>
                            <th>title</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display all projects --}}
                        @foreach ($timelines as $timelines)
                            <tr>
                                <td>{{ $timelines->quote }}</td>
                                <td>
                                    {{ $timelines->title }}
                                </td>
                                <td>{{ $timelines->image }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('timeline.edit', $timelines->id) }}"
                                                    class="dropdown-item">Edit</a></li>
                                            <li>
                                                <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteRecord">Delete</a>
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
        <div class="text-success fs-1">Upload timeline stories for site!</div>
        @include('Admin.components.forms.timeline')
    </div>
@endsection

@section('scripts')
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="timelineimage"]');

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
