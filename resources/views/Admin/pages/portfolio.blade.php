@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4">        
        <div class="text-success fs-1">Upload Company Projects for site!</div>
        @include('Admin.components.forms.porfolio')
    </div>
@endsection
