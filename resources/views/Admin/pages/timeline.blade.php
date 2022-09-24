@extends('layout.admin.index')

@section('content')
    {{-- display success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1">Upload timeline stories for site!</div>
        @include('Admin.components.forms.timeline')
    </div>
@endsection
