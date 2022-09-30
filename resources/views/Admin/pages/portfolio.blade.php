@extends('layout.admin.index')

@section('content')
    {{-- portfolio --}}
    <div class="container-fluid mt-4 px-4">
        {{-- notification --}}
        @include('Admin.components.errors.notifications')
        <div class="text-success fs-1 mb-2 text-capitalize">portfolio data</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                portfolio DataTable
            </div>
            <div class="card-body">
                <table id="portfolioTable">
                    <thead>
                        <tr>
                            <th>portfolio name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display all projects --}}
                        @foreach ($portfolios as $portfolios)
                            <tr>
                                <td>{{ $portfolios->name }}</td>
                                <td>
                                    {{ Str::limit($portfolios->about, 40) }}
                                </td>
                                <td>
                                    @if ($portfolios->status == 'Complete')
                                        <span class="badge text-bg-success">{{ $portfolios->status }}</span>
                                    @elseif ($portfolios->status == 'Running')
                                        <span class="badge text-bg-warning">{{ $portfolios->status }}</span>
                                    @else
                                        <span class="badge text-bg-secondary">{{ $portfolios->status }}</span>
                                    @endif                                    
                                </td>
                                <td>
                                    {{ Str::limit($portfolios->image, 40) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('portfolio.edit', $portfolios->id) }}"
                                                    class="dropdown-item">Edit</a></li>
                                            <li>
                                                <a href="" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#deleteRecord">Delete</a>
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
        <div class="text-success fs-1">Upload Company Projects for site!</div>
        @include('Admin.components.forms.porfolio')
    </div>
@endsection

@section('scripts')
    {{-- CKEDITOR --}}
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="portfolioimage"]');

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
