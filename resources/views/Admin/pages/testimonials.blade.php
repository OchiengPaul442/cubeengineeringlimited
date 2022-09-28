@extends('layout.admin.index')

@section('content')
    {{-- testimonials section --}}
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1 mb-2 text-capitalize">Testimonials data</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                Testimonials DataTable
            </div>
            <div class="card-body">
                <table id="testimonialsTable">
                    <thead>
                        <tr>
                            <th>Customer name</th>
                            <th>Occupation</th>
                            <th>Comments</th>
                            <th>Profile picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display --}}
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->occupation }}</td>
                                <td>
                                    {{ Str::limit($testimonial->comments, 40) }}
                                </td>
                                <td>
                                    {{ Str::limit($testimonial->image, 40) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                    class="dropdown-item">Edit</a></li>
                                            <li>
                                                <form action="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                    class="w-100" method="POST" style="display: inline-block">
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
        <div class="text-success fs-1">Upload customer testimonials for site!</div>
        @include('Admin.components.forms.testimonials')
    </div>
@endsection

@section('scripts')
    {{-- CKEDITOR --}}
    <script>
        CKEDITOR.replace('comments');
    </script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="testimonialimage"]');

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
