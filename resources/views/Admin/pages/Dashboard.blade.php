@extends('layout.admin.index')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        {{-- overview tabs --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body fs-5 text-black">portfolios</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $portfolio->count() }}</h2>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body fs-5 text-black">Services</div>
                    <h2 class="d-flex justify-content-end p-2">
                        {{ $service->count() }}</h2>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body fs-5 text-black">Client Messages</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $messages->count() }}</h2>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body fs-5 text-black">Testimonials</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $testimonial->count() }}</h2>
                </div>
            </div>
        </div>
        {{-- charts section showing data --}}
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Line Chart for Messages
                    </div>
                    <div>
                        @include('Admin.components.charts.messages')
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart For Projects 
                    </div>
                    <div>
                        @include('Admin.components.charts.projects')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
