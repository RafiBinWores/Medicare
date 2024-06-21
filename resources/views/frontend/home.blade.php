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

                    <a class="btn btn-primary mt-3 px-3" href="">Explore Now</a>
                </div>
                <div class="hero-image">
                    <img class="w-100 rounded-4" src="{{ asset('assets/img/doc.jpg') }}" alt="Hero image">
                </div>
            </div>

        </div>
    </section>

    <!-- Doctor specialization section -->
    <section class="specialization">
        <div class="container">
            <div class="title-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Consult our top specialized doctors</h3>
                    <a class="d-none d-md-block fw-medium" href="">View all <i
                            class="fa-regular fa-angle-right"></i></a>
                </div>
                <p>Our doctors are ready to serve you 24/7</p>
            </div>

            <div class="row text-center">
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <img src="assets/img/cardio.png" alt="">
                        <p>Cardiologist</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <img src="assets/img/teeth.png" alt="">
                        <p>Dentist</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <img src="assets/img/cardio.png" alt="">
                        <p>Cardiothoracic and Vascular Surgeon</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <i class="fa-solid fa-heart-circle-bolt"></i>
                        <p>Cardiologist</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <i class="fa-solid fa-heart-circle-bolt"></i>
                        <p>Andrology & Transplant Surgeon</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mt-3">
                    <div class="specialization-card">
                        <i class="fa-solid fa-heart-circle-bolt"></i>
                        <p>Cardiologist</p>
                    </div>
                </div>
            </div>
            <a class="specialization-view-btn" href="">View all <i class="fa-regular fa-angle-right"></i></a>
        </div>
    </section>

    <!-- Popular doctor section -->
    <section class="popular-doctors">
        <div class="container">
            <div class="title-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Popular Doctors</h3>
                    <a class="fw-medium" href="">View all <i class="fa-regular fa-angle-right"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card doctor-card mt-3">
                        <img src="assets/img/doc.jpg" class="rounded-1 p-3 pb-0" alt="Doctor image">
                        <div class="card-body p-3">
                            <span class="doctor-specialization">Dentist</span>
                            <p class="card-text mt-2 mb-1 fw-bold">
                                Asst. Prof. Dr. Tahmina Begum
                            </p>
                            <p class="card-text text-primary fw-medium mb-1" style="font-size: 14px;">
                                20 Years
                            </p>
                            <p class="card-text" style="font-size: 14px;">
                                House # 1-2, Block # D, Main Road, South Banasree, Dhaka, 1219
                            </p>

                            <a class="w-100 btn btn-outline-primary text-center" href="">Book Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Popular Ambulance section -->
    <section class="popular-ambulance" style="margin-bottom: 100px;">
        <div class="container">
            <div class="title-content">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Ambulance</h3>
                    <a class="fw-medium" href="">View all <i class="fa-regular fa-angle-right"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card doctor-card mt-3">
                        <img src="assets/img/doc.jpg" class="rounded-1 p-3 pb-0" alt="Doctor image">
                        <div class="card-body p-3">
                            <span class="doctor-specialization">Dhaka</span>
                            <p class="card-text mt-2 mb-1 fw-bold">
                                AL AMIN- AMBULANCE SERVICE
                            </p>
                            <a href="" class="card-text text-primary fw-medium" style="font-size: 14px;">
                                01706602203
                            </a>
                            <a href="" class="card-text text-primary fw-medium" style="font-size: 14px;">
                                01706602203
                            </a>
                            <p class="card-text" style="font-size: 14px;">
                                House # 1-2, Block # D, Main Road, South Banasree, Dhaka, 1219
                            </p>

                            <a class="w-100 btn btn-outline-primary text-center" href="">Book Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
                    <a class="btn btn-primary" href="">Sell all articles</a>
                </div>
                <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                    <div class="swiper mySwiper w-100">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="card card-slider border-0">
                                    <img src="assets/img/doc.jpg" alt="">
                                    <div class="card-body text-start mt-1 ps-0 pt-2">
                                        <p class="mb-2">About Web devolvement</p>
                                        <p class="blog-category">Health <span><i class="fa-regular fa-calendar-days"></i>
                                                jan 24, 2024</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-slider border-0">
                                    <img src="assets/img/01.jpg" alt="">
                                    <div class="card-body text-start mt-1 ps-0 pt-2">
                                        <p class="mb-2">About ux/ui design</p>
                                        <p class="blog-category">Health <span><i class="fa-regular fa-calendar-days"></i>
                                                jan 24, 2024</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-slider border-0">
                                    <img src="assets/img/doc.jpg" alt="">

                                    <div class="card-body text-start mt-1 ps-0 pt-2">
                                        <p class="mb-2">About ux/ui design</p>
                                        <p class="blog-category">Health <span><i class="fa-regular fa-calendar-days"></i>
                                                jan 24, 2024</span></p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
