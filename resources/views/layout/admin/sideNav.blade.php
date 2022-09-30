<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('Admin.dashboard') }}">
                <div class="sb-nav-link-icon">
                    <x-carbon-dashboard-reference style="width: 18px" />
                </div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link" href="{{ route('messages.index') }}">
                <div class="sb-nav-link-icon">
                    <x-carbon-mail-all style="width: 18px" />
                </div>
                Client Messages
            </a>
            <a class="nav-link" href="{{ route('timeline.create') }}">
                <div class="sb-nav-link-icon">
                    <x-carbon-event style="width: 18px" />
                </div>
                Timeline management
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon">
                    <x-carbon-data-base-alt style="width: 18px" />
                </div>
                Forms
                <div class="sb-sidenav-collapse-arrow">
                    <x-carbon-caret-sort-down style="width: 20px" />
                </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('services.create') }}">Services
                    </a>
                    <a class="nav-link" href="{{ route('FAQs.create') }}">FAQs
                    </a>
                    <a class="nav-link" href="{{ route('portfolio.create') }}">Portfolio</a>
                    <a class="nav-link" href="{{ route('testimonials.create') }}">Testimonials</a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Account</div>
            <a class="nav-link" href="{{ route('Auth.show',session('userID')) }}">
                <div class="sb-nav-link-icon">
                    <x-carbon-user-admin style="width: 18px" />
                </div>
                Profile
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{-- display admins name using session --}}
        @if (session()->has('userID'))
            {{ session()->get('userEmail') }}
        @endif
    </div>
</nav>
