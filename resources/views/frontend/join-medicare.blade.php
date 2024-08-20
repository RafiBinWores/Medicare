@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Join Medicare
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    {{-- <section class="p-3" style="background-color: #023154; margin-bottom: 80px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Join medicare</li>
                </ol>
            </nav>
        </div>
    </section> --}}

    <div class="container text-center mb-5" style="margin-top:80px;">
        <h4 class="mb-1 fw-bold" style="color: #3a3a3a;">
            Welcome To Medicare!
        </h4>
        <p class=" fw-light text-secondary">Choose an option</p>
        <div class="row g-4 mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('frontend.doctorForm') }}" class="btn btn-outline-primary">
                    Join as Doctor <i class="fa-regular fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('frontend.ambulanceForm') }}" class="btn btn-outline-primary">
                    Join as Ambulance service provider <i class="fa-regular fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('account.editProfile') }}" class="btn btn-outline-primary">
                    Join as Blood donor <i class="fa-regular fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
