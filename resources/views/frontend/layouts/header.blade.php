<header>
    <div class="nav-container">
        <nav class="navbar navbar-expand-lg mt-2 mb-2">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img class="nav-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                </a>
                <div class="d-flex align-items-center d-lg-none">
                    @if (Auth::check())
                        <li class="nav-item dropdown pe-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('assets/img/user.png') }}" alt="user" width="35px">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                <li class="dropdown-item fw-medium">{{ Auth::user()->name ?? 'N/A' }}</li>
                                <li class="dropdown-item text-secondary" style="font-size: 14px;">
                                    {{ Auth::user()->email }}
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">My
                                        Account</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Profile</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Appointments</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Change
                                        password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-medium" href="{{ route('account.logout') }}">logout</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse justify-content-between align-items-center ms-2 navbar-collapse"
                    id="navbarNavDropdown">

                    <ul class="navbar-nav gap-2">
                        <li class="nav-item">
                            <a class="nav-link" href="doctor.html">Find Doctor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Find Ambulance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Find Blood Donor</a>
                        </li>
                    </ul>

                    @if (!Auth::check())
                        <div class="account d-sm-block d-flex align-items-center gap-3">
                            <a class="btn btn-outline-primary" href="{{ route('account.login') }}">Log in</a>
                            <a class="btn
                            btn-primary"
                                href="{{ route('account.registration') }}">Sign up</a>
                        </div>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-regular fa-user"></i> My account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                <li class="dropdown-item fw-medium">{{ Auth::user()->name ?? 'N/A' }}</li>
                                <li class="dropdown-item text-secondary" style="font-size: 14px;">
                                    {{ Auth::user()->email }}
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">My
                                        Account</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Profile</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Appointments</a>
                                </li>
                                <li><a class="dropdown-item fw-medium" href="">Change
                                        password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-medium" href="{{ route('account.logout') }}">logout</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                </div>
            </div>
        </nav>
    </div>
</header>
