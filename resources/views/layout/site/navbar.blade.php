<nav class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/Group 53.png') }}" width="150px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="d-flex justify-content-between" style="width: 100%">
                        <ul class="navbar-nav" id="navbar-item-tracker">
                            <a href="#home" class="nav-item nav-link">Home</a>
                            <a href="#about" class="nav-item nav-link">About</a>
                            <a href="#services" class="nav-item nav-link">Service</a>
                            <a href="#portfolio" class="nav-item nav-link">Project</a>
                            <a href="#FAQs" class="nav-item nav-link">FAQs</a>
                            <a href="#contact" id="contact-btn-nav-1" class="nav-item nav-link">Contact</a>
                            <a href="#partners" class="nav-item nav-link">Partners</a>
                        </ul>
                        <a href="#contact" id="contact-btn-nav-2" class="nav-item nav-link">
                            <button type="button" class="btn btn-outline-warning">Contact Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</nav>

