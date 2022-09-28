@extends('layout.admin.index')

@section('content')
    <div class="container-fluid mt-4 px-4 profile-body">
        {{-- notifiaction --}}
        @include('Admin.components.errors.notifications')
        <div class="container">
            <div class="main-body">

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4 class="text-capitalize">{{ $user->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $user->role }}</p>
                                        <p class="text-muted font-size-sm">{{ $user->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item align-items-center">
                                    <a href="{{ route('home') }}" class="btn w-100" style="background: yellow">Go Site</a>
                                </li>
                                <li class="list-group-item align-items-center">
                                    <a href="" class="btn btn-info w-100"  data-bs-toggle="modal" data-bs-target="#changepwd">Change Password</a>
                                </li>
                                <li class="list-group-item align-items-center">
                                    <a href="" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteaccount">Delete account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        {{-- form --}}
                        <div class="card mb-3">
                            @include('Admin.components.forms.profile')
                        </div>

                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush h-100">
                                            <li class="list-group-item h-50"><a href="{{ route('portfolio.create') }}" class="h-100 w-100 d-flex justify-content-between btn btn-success postion-relative"><span class="fs-2">Projects</span><span class="fs-3 position-absolute" style="bottom: 15px;right:35px">{{$portfolio->count()}}</span></a></li>
                                            <li class="list-group-item h-50"><a href="{{ route('messages.index') }}" class="h-100 w-100 d-flex justify-content-between btn btn-danger postion-relative"><span class="fs-2">Mail</span><span class="fs-3 position-absolute" style="bottom: 15px;right:35px">{{$messages->count()}}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush h-100">
                                            <li class="list-group-item h-50"><a href="{{ route('testimonials.create') }}" class="h-100 w-100 d-flex justify-content-between btn btn-warning postion-relative"><span class="fs-2">Testimonials</span><span class="fs-3 position-absolute" style="bottom: 15px;right:35px">{{$testimonial->count()}}</span></a></li>
                                            <li class="list-group-item h-50"><a href="{{ route('services.create') }}" class="h-100 w-100 d-flex justify-content-between btn btn-secondary postion-relative"><span class="fs-2">Services</span><span class="fs-3 position-absolute" style="bottom: 15px;right:35px">{{$service->count()}}</span></a></li>
                                            <li class="list-group-item h-50"><a href="{{ route('FAQs.create') }}" class="h-100 w-100 d-flex justify-content-between btn btn-dark postion-relative"><span class="fs-2">FAQs</span><span class="fs-3 position-absolute" style="bottom: 15px;right:35px">{{$FAQs->count()}}</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
