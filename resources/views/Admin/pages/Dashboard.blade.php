@extends('layout.admin.index')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
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
        {{-- overview tabs --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body fs-5 text-black">portfolios</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $portfolioCount }}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <x-carbon-chevron-right style="width: 20px" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body fs-5 text-black">Services</div>
                    <h2 class="d-flex justify-content-end p-2">
                        {{ $servicesCount }}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <x-carbon-chevron-right style="width: 20px" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body fs-5 text-black">Client Messages</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $messagesCount }}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <x-carbon-chevron-right style="width: 20px" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body fs-5 text-black">Testimonials</div>
                    <h2 class="d-flex justify-content-end p-2">{{ $testimonialsCount }}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white">
                            <x-carbon-chevron-right style="width: 20px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- tables section showing data --}}
        {{-- portfolio --}}
        <div class="container-fluid mt-4 px-4">
            <div class="text-success fs-1 mb-2">portfolio data</div>
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
                            @foreach ($portfolio as $portfolio)
                                <tr>
                                    <td>{{ $portfolio->name }}</td>
                                    <td>
                                        {{ Str::limit($portfolio->description, 40) }}
                                    </td>
                                    <td>{{ $portfolio->status }}</td>
                                    <td>
                                        {{ Str::limit($portfolio->image, 40) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Service section --}}
        <div class="container-fluid mt-4 px-4">
            <div class="text-success fs-1 mb-2">Services data</div>
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
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>
                                        {{ Str::limit($service->description, 40) }}
                                    </td>
                                    <td>{{ Str::limit($service->details, 40) }}</td>
                                    <td>
                                        {{ $service->image }}
                                    </td>
                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- FAQs section --}}
        <div class="container-fluid mt-4 px-4">
            <div class="text-success fs-1 mb-2">FAQs data</div>
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
                            @foreach ($FAQs as $FAQ)
                                <tr>
                                    <td>{{ $FAQ->question }}</td>
                                    <td>
                                        {{ Str::limit($FAQ->answer, 40) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('FAQs.edit', $FAQ->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('FAQs.destroy', $FAQ->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- testimonials section --}}
        <div class="container-fluid mt-4 px-4">
            <div class="text-success fs-1 mb-2">Testimonials data</div>
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
                                        <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="container-fluid mt-4 px-4">
            <div class="text-success fs-1 mb-2">Timeline data</div>
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
                            @foreach ($timeline as $timeline)
                                <tr>
                                    <td>{{ $timeline->quote }}</td>
                                    <td>
                                        {{ $timeline->title }}
                                    </td>
                                    <td>{{ $timeline->image }}</td>
                                    <td>
                                        <a href="{{ route('timeline.edit', $timeline->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('timeline.destroy', $timeline->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
