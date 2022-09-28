<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/Group1.png') }}" type="image/x-icon">
    {{-- bootstarp css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    {{-- lib css --}}
    <link rel="stylesheet" href="{{ asset('lib/flaticon/font/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/slick/slick-theme.css') }}" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        {{-- header section --}}
        @include('layout.site.header')
        {{-- end header section --}}

        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Our Services</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="">Our Services</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- service descriptions --}}
        <section class="service-display-details">
            <div class="container w-100 service-details">
                <h1>{{ $service->name }}</h1>
                <span>Details</span>
                <div>
                    {!! $service->details !!}
                </div>
            </div>
        </section>
        {{-- end of service descriptions --}}

        {{-- other services --}}
        <section class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Services</p>
                    <h2>We Provide Services</h2>
                </div>
                <livewire:load-more>
            </div>
        </section>
        {{-- end of other services --}}

        {{-- Facts section --}}
        <section id="facts">
            <div class="fact">
                <div class="container-fluid">
                    <div class="row counters">
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">16</h2>
                                        <p>Expert Workers</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">29</h2>
                                        <p>Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-address"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">29</h2>
                                        <p>Completed Projects</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-crane"></i>
                                    </div>
                                    <div class="fact-text">
                                        <span class="d-flex gap-2">
                                            <h2 data-toggle="counter-up">10</h2><span class="fs-3">+</span>
                                        </span>
                                        <p>Running Projects</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end of facts section --}}


        {{-- FAQs section --}}
        <section id="FAQs">
            <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>People Also Asked</p>
                        <h2>You May Ask</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="accordion-1">
                                @foreach ($FAQs->slice(0, 5) as $FAQ)
                                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse"
                                                href="#collapse{{ $FAQ->id }}">
                                                {{ $FAQ->question }}
                                            </a>
                                        </div>
                                        <div id="collapse{{ $FAQ->id }}" class="collapse"
                                            data-parent="#accordion-1">
                                            <div class="card-body">
                                                {{ $FAQ->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="accordion-2">
                                @foreach ($FAQs->slice(5, 10) as $FAQ)
                                    <div class="card wow fadeInRight" data-wow-delay="0.{{ $FAQ->id }}s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse"
                                                href="#collapse{{ $FAQ->id }}">
                                                {{ $FAQ->question }}
                                            </a>
                                        </div>
                                        <div id="collapse{{ $FAQ->id }}" class="collapse"
                                            data-parent="#accordion-2">
                                            <div class="card-body">
                                                {{ $FAQ->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end of FAQs --}}


        {{-- footer section --}}
        @include('layout.site.footer')
        {{-- end of footer section --}}
    </div>
    {{-- floating call button --}}
    <section>
        <span class="floating-call-btn">
            <a href="tel:+256776024658">
                <i class="fa fa-phone my-float"></i>
            </a>
        </span>
    </section>
    {{-- end of floating call button --}}

    {{-- scroll to top --}}
    @include('components.Button.scrolltotop')

    {{-- loader --}}
    @include('components.loaders.main')
    {{-- js links --}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/lib/slick/slick.min.js') }}"></script>
    @livewireScripts
</body>

</html>
