<footer class="footer wow fadeIn" data-wow-delay="0.3s">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 col-lg-3">
                <div class="footer-contact">
                    <h2>Office Contact</h2>
                    <p class="text-uppercase"><i class="fa fa-map-marker-alt"></i>Blue Heights, Level 3 Nkrumah Rd</p>
                    <p class="text-uppercase"><a href="tel:+256 776024658"><i class="fa fa-phone-alt"></i>+256 776024658</a></p>
                    <p class="text-uppercase"><a href="tel:+256774764199"><i class="fa fa-phone-alt"></i>+256774764199</a></p>
                    <p class="text-uppercase"><a href="tel:+256708881648"><i class="fa fa-phone-alt"></i>+256708881648</a></p>
                    <p class=""><a href="mailto:cubeengineeringlimited@gmail.com"><i class="fa fa-envelope"></i>cubeengineeringlimited@gmail.com</a></p>
                    <div class="footer-social">
                        <a target="_blank" href="https://twitter.com/CubeEngineers?s=20&t=YOPh578w5sA3VX3KHRhieg"><i
                                class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/cube-engineering-and-general-supplies-limited/"><i class="fab fa-linkedin-in"></i></a>
                        <a target="_blank" href="https://mail.google.com"><i class="fa fa-envelope"></i></a>
                        {{-- <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Services Areas</h2>
                    @php
                        $services = App\Models\service::all();
                    @endphp
                    @foreach ($services as $service)
                        <a href="{{ route('services.show', $service->id) }}"
                            class="text-uppercase">{{ $service->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Useful Pages</h2>
                    @if (Request::is('privacy', 'terms', 'services/*'))
                        <a class="text-uppercase" href="{{ route('home') }}">About Us</a>
                        <a class="text-uppercase" href="{{ route('home') }}">Contact Us</a>
                        <a class="text-uppercase" href="{{ route('home') }}">Projects</a>
                        <a class="text-uppercase" href="{{ route('home') }}">Testimonial</a>
                    @else
                        <a class="text-uppercase" href="#about">About Us</a>
                        <a class="text-uppercase" href="#contact">Contact Us</a>
                        <a class="text-uppercase" href="#projects">Projects</a>
                        <a class="text-uppercase" href="#testimonials">Testimonial</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container footer-menu">
        <div class="f-menu">
            <a class="text-uppercase" href="{{ route('terms') }}">Terms of use</a>
            <a class="text-uppercase" href="{{ route('privacy') }}">Privacy policy</a>
        </div>
    </div>
    <div class="container copyright">
        <div class="row">
            <div class="col-md-6">
                <p class="text-uppercase">&copy; <a href="{{ route('home') }}">
                    Cube Engineering 
                    @php
                        echo date('Y');
                    @endphp
                </a>, All Right Reserved.</p>
            </div>
            <div class="col-md-6">
                <p class="text-uppercase">Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
            </div>
        </div>
    </div>
</footer>
