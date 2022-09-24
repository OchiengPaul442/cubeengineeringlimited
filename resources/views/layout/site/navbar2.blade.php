<nav class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/Group 53.png') }}" width="150px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="d-flex justify-content-between w-100">
                        <ul class="navbar-nav text-center">
                            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('home') }}" class="nav-item nav-link">About</a>
                            <a href="{{ route('home') }}" class="nav-item nav-link">Service</a>
                            <a href="{{ route('home') }}" class="nav-item nav-link">Project</a>
                            <a href="{{ route('home') }}" class="nav-item nav-link">FAQs</a>
                            <a href="{{ route('home') }}" id="contact-btn-nav-1" class="nav-item nav-link">Contact</a>
                            <a href="{{ route('home') }}" class="nav-item nav-link">Partners</a>
                        </ul>
                        <a href="{{ route('home') }}" id="contact-btn-nav-2" class="nav-item nav-link">
                            <button type="button" class="btn btn-outline-warning">Contact Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</nav>
