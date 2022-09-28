<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/Group1.png') }}" type="image/x-icon">
    {{-- bootstarp css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}" type="text/css">
    {{-- lib css --}}
    <link rel="stylesheet" href="{{ asset('lib/flaticon/font/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" type="text/css">
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
        {{-- main content --}}
        @include('components.carousels.home')
        <!-- Feature Start-->
        <div class="feature wow fadeInUp" data-wow-delay="0.1s">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="flaticon-worker"></i>
                            </div>
                            <div class="feature-text">
                                <h3>Expert Worker</h3>
                                <x-carbon-checkmark-outline style="width:45px; color:orange" />

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="flaticon-building"></i>
                            </div>
                            <div class="feature-text">
                                <h3>Quality Work</h3>
                                <x-carbon-checkmark-outline style="width:45px; color:orange" />

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="feature-text">
                                <h3>24/7 Support</h3>
                                <x-carbon-checkmark-outline style="width:45px; color:orange" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->

        {{-- about section --}}
        <section id="about">
            <div class="about-container-wrapper">
                <div id="about" class="about wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <div class="about-img">
                                    <img src="{{ asset('images/Premium Photo Future building construction engineering project_.jpg') }}"
                                        alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="section-header text-left">
                                    <h2 class="fw-bold mb-2">Cube Engineering And General Supplies Limited</h2>
                                    <small>SERVE YOU BETTER</small>
                                    <div class="Line mt-4 mb-4"></div>
                                    <p>About Us</p>
                                </div>
                                <div class="about-text">
                                    <p>
                                        Cube Engineering and General Supplies Ltd is a multi-disciplinary engineering firm
                                        duly
                                        registered as a limited Company with an aim to provide quality services in the
                                        industry.
                                        Cube Engineering was founded on 7th March 2021 and incorporated on 14th July 2021 in
                                        Kampala
                                        Uganda.
                                        <br>
                                        <br>
                                        Since its inception it has been at the forefront of providing a wide range of
                                        engineering services ranging from routine maintenance, Heavy duty machinery
                                        overhauls to
                                        turn key project management, implementation and Execution. Cube Engineering’s
                                        expertise
                                        has been developed from former employees of different organizations who have been
                                        involved in execution of number of construction, mechanical and electrical projects.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Begin About Section --}}
                <div class="About_sec wow fadeInUp" id="about" data-wow-delay="0.2s">
                    <div class="Center">
                        <h3>More about us</h3>
                        <div class="Line mt-4"></div>
                        {{-- Begin Tab side --}}
                        <div class="Tabside">
                            <ul>
                                <li><a href="#" class="text-dark tabLink activeLink" id="cont-1">Mission</a></li>
                                <li><a href="#" class="text-dark tabLink" id="cont-2">vision</a></li>
                                <li><a href="#" class="text-dark tabLink" id="cont-3">Values</a></li>
                            </ul>
                            <div class="clear"></div>
                            <div class="tabcontent" id="cont-1-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src="{{ asset('images/vision.jpg') }}" alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src="{{ asset('images/1663739612016 1.jpg') }}" alt="image">
                                        </figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>Our Mission</h3>
                                    <p>
                                        To be the leader in offering the highest degree of technical and operational
                                        efficiency for
                                        our
                                        clients through provision of high quality engineering work.
                                    </p>
                                </div>
                            </div>
                            <div class="tabcontent hide" id="cont-2-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src="{{ asset('images/vision.jpg') }}" alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src="{{ asset('images/augst 002.jpg') }}" alt="image"></figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>Our Vision</h3>
                                    <p>
                                        To be the leading Services Provider in the engineering sector with high focus on
                                        Customer
                                        Satisfaction
                                    </p>
                                </div>
                            </div>
                            <div class="tabcontent hide" id="cont-3-1">
                                <div class="TabImage">
                                    <div class="img1">
                                        <figure><img src="{{ asset('images/vision.jpg') }}" alt="image"></figure>
                                    </div>
                                    <div class="img2">
                                        <figure><img src="{{ asset('images/SEPT 02.jpg') }}" alt="image">
                                        </figure>
                                    </div>
                                </div>
                                <div class="Description">
                                    <h3>Our Core Values</h3>
                                    <p><span>Integrity:</span> Honesty and strong moral principles.</p>
                                    <p><span>Customer Satisfaction:</span> Exceed customer expectations.</p>
                                    <p><span>Professionalism:</span> Skill, good judgement and individual adherence to the
                                        set
                                        standards.</p>
                                    <p><span>Innovation:</span> Take pro-active steps to drive performance.</p>
                                    <p><span>Teamwork:</span> Collaborate with others to achieve company goals.</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        {{-- End Tab Side --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- end of about section --}}

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

        {{-- Services section --}}
        <section id="services">
            <div class="service wow fadeInUp">
                <div class="section-header text-center">
                    <p>Our Services</p>
                    <h2>Services We Provide</h2>
                </div>
                <livewire:load-more />
            </div>
        </section>
        {{-- end of services section --}}

        {{-- portfolio section --}}
        <section id="portfolio" class="wow fadeIn">
            <div class="section-header text-center">
                <p>Projects</p>
                <h2>Our Projects</h2>
            </div>
            <div class="container-fluid bg-portfolio py-5">
                <div class="container py-5">
                    <div class="row m-0 portfolio-container">
                        @foreach ($portfolio as $portfolios)
                            <div class="col-lg-4 col-md-6 col-sm-12 p-0 portfolio-item">
                                <div class="position-relative overflow-hidden">
                                    <div class="portfolio-img">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('/storage/images/' . $portfolios->image) }}"
                                            alt="">
                                    </div>
                                    <div class="portfolio-text">
                                        <h4 class="font-weight-bold mb-4">{{ $portfolios->name }}</h4>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p class="text-center" class="text-center">{!! $portfolios->about !!}</p>
                                            </p>
                                            <a class="btn btn-sm btn-secondary m-1"
                                                href="{{ asset('/storage/images/' . $portfolios->image) }}"
                                                data-lightbox="portfolio">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        {{-- end of projects section --}}

        {{-- FAQs section --}}
        <section id="FAQs">
            <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Frequently Asked Question</p>
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
                                                {!! $FAQ->answer !!}
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
                                                {!! $FAQ->answer !!}
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

        {{-- Testimonial section --}}
        <section id="testimonials">
            <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
                <div class="section-header text-center">
                    <p>Testimonials</p>
                    <h2 style="color: white">From Our Customers</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider-nav">
                                @foreach ($testimonials as $testimonial)
                                    <div class="slider-nav">
                                        <img src="{{ asset('/storage/images/' . $testimonial->image) }}"
                                            alt="Testimonial">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="slider-item">
                                        <h3>{{ $testimonial->customername }}</h3>
                                        <h4>{{ $testimonial->occupation }}</h4>
                                        <p>{!! $testimonial->comments !!}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end of testimonial section --}}

        {{-- contact section --}}
        <section id="contact">
            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2>For Any Query</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="flaticon-address"></i>
                                    <div class="contact-text">
                                        <h2>Location</h2>
                                        <p>Blue Heights, Level 3 Nkrumah Rd</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-call"></i>
                                    <div class="contact-text">
                                        <h2>Phone</h2>
                                        <p>+256 776024658</p>
                                        <p>+256774764199</p>
                                        <p>+256708881648</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-send-mail"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p class="d-flex flex-wrap">cubeengineeringlimited@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- contact form section --}}
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                @include('components.Forms.contact')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
        </section>
        {{-- end of contact section --}}

        {{-- partners section --}}
        <section id="partners">
            <div class="container wow fadeIn">
                <div class="section-header text-center">
                    <p>Partners</p>
                    <h2>Our key partners</h2>
                </div>
                <div class="text-center">
                    <div class="row align-items-center">
                        <div class="col">
                            <img width="280px" src="{{ asset('images/Strabag.svg.png') }}" alt="partner-logos">
                        </div>
                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 4.svg') }}" alt="partner-logos">
                        </div>
                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 5.svg') }}" alt="partner-logos">
                        </div>
                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 6.svg') }}" alt="partner-logos">
                        </div>

                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 7.svg') }}" alt="partner-logos">
                        </div>

                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 9.svg') }}" alt="partner-logos">
                        </div>
                        <div class="col">
                            <img width="280px" src="{{ asset('images/image 8.svg') }}" alt="partner-logos">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end of partners section --}}

        {{-- TIMELINE --}}
        <section id="timeline">
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="row align-items-end mb-4 timeline-head">
                        <div class="col-lg-6">
                            <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Daily Reminders</h6>
                            <h1 class="section-title mb-3">Always Deliver more than expected.</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-carousel timeline-carousel position-relative">
                                @foreach ($timeline as $timeline)
                                    <div class="timeline d-flex flex-column text-center rounded overflow-hidden">
                                        <div class="position-relative">
                                            <div class="timeline-img">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('storage/images/' . $timeline->image) }}"
                                                    alt="">
                                            </div>
                                            <div
                                                class="timeline-social d-flex flex-column align-items-center justify-content-center">
                                                <a class="btn btn-secondary btn-social mb-2"
                                                    href="https://twitter.com/CubeEngineers?s=20&t=YOPh578w5sA3VX3KHRhieg"><i
                                                        class="fab fa-twitter"></i></a>
                                                <a class="btn btn-secondary btn-social mb-2"
                                                    href="https://www.linkedin.com/company/cube-engineering-and-general-supplies-limited/"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                                <a href="" class="btn btn-secondary btn-social mb-2"><i
                                                        class="fab fa-facebook-f"></i></a>
                                                <a href="mailto:cubeengineeringlimited@gmail.com" class="btn btn-secondary btn-social mb-2"><i
                                                        class="fa fa-envelope"></i></a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column timeline-text text-center py-4">
                                            <h5 class="font-weight-bold">{{ $timeline->title }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        {{-- END OF TIMELINE --}}

        {{-- google maps to business --}}
        <section>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7594577220207!2d32.58001141521419!3d0.31122996411729714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbdd0eca93c03%3A0x38c6dc5b1d215262!2sBlue%20Heights!5e0!3m2!1sen!2sug!4v1663617359157!5m2!1sen!2sug"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="mt-5"></iframe>
        </section>
        {{-- end of google maps to business --}}

        {{-- floating call button --}}
        <section>
            <span class="floating-call-btn">
                <a href="tel:+256776024658">
                    <i class="fa fa-phone my-float"></i>
                </a>
            </span>
        </section>
        {{-- end of floating call button --}}

        {{-- modals --}}
        @include('components.modals.errors')
        {{-- end of main content --}}

        {{-- footer section --}}
        @include('layout.site.footer')

        {{-- back to top button --}}
        @include('components.Button.scrolltotop')
    </div>
    {{-- loader --}}
    @include('components.loaders.main')

    {{-- js links --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/slick/slick.min.js') }}"></script>
    @livewireScripts
</body>

</html>
