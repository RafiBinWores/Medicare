@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Book appointment, ambulance service and blood donor online
@endsection

{{-- page content --}}
@section('content')
    <!-- Hero section -->
    <section class="hero">
        <div class="container py-4">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Find & Book <span>Appointment</span> with your Fav <span>Doctor</span>
                        <!-- Find & Book Appointments with Your Favorite Doctors, Ambulance Services, and Blood Donors -->
                    </h1>
                    <p class="hero-description">
                        Say goodbye to endless phone calls and long queues. Book doctors' appointments, ambulance
                        service, manage medical records, find blood donor and more. Take the first step towards
                        better health.
                    </p>

                    <a class="btn btn-primary mt-3 px-3" href="#specialization">Explore Now</a>
                </div>
                <div class="hero-image">
                    <img class="w-100 rounded-4" src="{{ asset('assets/img/doc.jpg') }}" alt="Hero image">
                </div>
            </div>

        </div>
    </section>

    <!-- Doctor specialization section -->
    <section class="specialization" id="specialization">
        <div class="container">
            <div class="title-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Consult our top specialized doctors</h3>
                    <a class="d-none d-md-block fw-medium" href="{{ route('frontend.specializations') }}">View all <i
                            class="fa-regular fa-angle-right"></i></a>
                </div>
                <p>Our doctors are ready to serve you 24/7</p>
            </div>

            <div class="row text-center">
                @foreach ($specializations as $specialization)
                    <div class="col-6 col-md-4 col-lg-2 mt-3">
                        <a href="{{ route('specializations.specializedDoctor', $specialization->slug) }}"
                            class="specialization-card">
                            <img src="{{ Storage::url('specialization/' . $specialization->image) }}"
                                alt="{{ $specialization->name }}">
                            <p>{{ $specialization->name }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
            <a class="specialization-view-btn" href="">View all <i class="fa-regular fa-angle-right"></i></a>
        </div>
    </section>

    <!-- Popular doctor section -->
    @if ($doctors->isNotEmpty())
        <section class="popular-doctors">
            <div class="container">
                <div class="title-content">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Popular Doctors</h3>
                        <a class="fw-medium" href="{{ route('doctors.view') }}">View all <i
                                class="fa-regular fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card doctor-card mt-3">
                                <img src="{{ Storage::url('doctor/' . $doctor->image) }}" class="p-3 pb-0"
                                    alt="Doctor image">
                                <div class="card-body p-3">
                                    <span class="doctor-specialization">{{ $doctor->specialization->name }}</span>
                                    <p class="card-text mt-2 mb-1 fw-bold">
                                        {{ $doctor->name }}
                                    </p>
                                    <p class="card-text text-primary fw-medium mb-1" style="font-size: 14px;">
                                        {{ $doctor->experience }} Years
                                    </p>
                                    <p class="card-text" style="font-size: 14px;">
                                        {{ $doctor->clinic_address }}
                                    </p>

                                    <a class="w-100 btn btn-outline-primary text-center"
                                        href="{{ route('doctors.doctorDetails', $doctor->slug) }}">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <!-- Popular Ambulance section -->
    @if ($ambulances->isNotEmpty())
        <section class="popular-ambulance" style="margin-bottom: 100px;">
            <div class="container">
                <div class="title-content">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Ambulance</h3>
                        <a class="fw-medium" href="{{ route('ambulances.view') }}">View all <i
                                class="fa-regular fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($ambulances as $ambulance)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card doctor-card mt-3">
                                <img src="{{ Storage::url('ambulance/' . $ambulance->image) }}" class="p-3 pb-0"
                                    alt="Ambulance image">
                                <div class="card-body p-3">
                                    <span class="doctor-specialization"> {{ $ambulance->city->name }}</span>
                                    <p class="card-text mt-2 mb-1 fw-bold">
                                        {{ $ambulance->name }}
                                    </p>
                                    <a href="tel:{{ $ambulance->phone }}" class="card-text text-primary fw-medium"
                                        style="font-size: 14px;">
                                        {{ $ambulance->phone }}
                                    </a>
                                    <p class="card-text" style="font-size: 14px;">
                                        {{ $ambulance->address }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif

    <!--  Blood donor section -->
    @if ($bloodDonors->isNotEmpty())
        <section class="popular-ambulance" style="margin-bottom: 100px;">
            <div class="container">
                <div class="title-content">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Blood Donor</h3>
                        <a class="fw-medium" href="{{ route('bloodDonors.view') }}">View all <i
                                class="fa-regular fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($bloodDonors as $bloodDonor)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card doctor-card mt-3">
                                @if (empty($bloodDonor->image))
                                    <img src="{{ asset('assets/img/blood-donor.png') }}" class="p-3 pb-0"
                                        alt="Doctor image">
                                @else
                                    <img src="{{ Storage::url('profile/' . $bloodDonor->image) }}" class="p-3 pb-0"
                                        alt="Doctor image">
                                @endif
                                <div class="card-body p-3">
                                    <span class="doctor-specialization">{{ $bloodDonor->city->name }}</span>
                                    <p class="card-text mt-2 mb-1 fw-bold">
                                        {{ $bloodDonor->name }}
                                    </p>
                                    <div class="mb-2">
                                        <a href="tel:{{ $bloodDonor->phone }}" class="card-text text-primary fw-medium"
                                            style="font-size: 14px;">
                                            {{ $bloodDonor->phone }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif


    <!-- Latest Blog section -->
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h4 class="blog-title">
                        Read top articles from health experts
                    </h4>
                    <p class="blog-description">
                        Health articles that keep you informed about good health practices and achieve your goals.
                    </p>
                    <a class="btn btn-primary" href="{{ route('blogs.view') }}">Sell all articles</a>
                </div>
                <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                    <div class="swiper mySwiper w-100">
                        <div class="swiper-wrapper">

                            @foreach ($blogs as $blog)
                                <a href="{{ route('blogs.blogDetails', $blog->slug) }}" class="swiper-slide">
                                    <div class="card card-slider border-0">
                                        <img src="{{ Storage::url('blog/' . $blog->image) }}" alt="">
                                        <div class="card-body text-start mt-1 ps-0 pt-2">
                                            <p class="mb-2">{{ $blog->title }}</p>
                                            <p class="blog-category"><span><i class="fa-regular fa-calendar-days"></i>
                                                    {{ $blog->created_at->format('M d, Y') }}</span></p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
