@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="text-success fs-1">Upload customer testimonials for site!</div>
        @include('Admin.components.forms.testimonials')
    </div>
@endsection
