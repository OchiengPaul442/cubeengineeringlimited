@extends('layout.admin.index')

@section('content')
    {{-- FAQs section --}}
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1 mb-2 text-capitalize">FAQs data</div>
        <div class="card mb-4">
            <div class="card-header">
                <x-carbon-column-dependency style="width: 20px;margin-right:10px" />
                FAQs DataTable
            </div>
            <div class="card-body">
                <table id="FAQsTable">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- display all projects --}}
                        @foreach ($FAQs as $FAQs)
                            <tr>
                                <td>{{ $FAQs->question }}</td>
                                <td>
                                    {{ Str::limit($FAQs->answer, 40) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn-sm btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <x-carbon-overflow-menu-horizontal style="width:20px;" />
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('FAQs.edit', $FAQs->id) }}" class="dropdown-item">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('FAQs.destroy', $FAQs->id) }}" class="w-100"
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
        <div class="text-success fs-1">Upload Company FAQ for site!</div>
        @include('Admin.components.forms.FAQs')
    </div>
@endsection
@section('scripts')
    {{-- CKEDITOR --}}
    <script>
        CKEDITOR.replace('answer');
    </script>
@endsection
