@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Specilazion
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    <section class="p-3" style="background-color: #023154; margin-bottom: 50px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">{{ $specialization->name }}</li>
                </ol>
            </nav>
        </div>

        {{-- Search --}}
        <div class="container mt-3">
            <form method="GET" class="d-flex mb-2" role="search">
                <input class="form-control shadow-sm py-2" type="search" name="search"
                    value="{{ Request::get('search') }}" placeholder="Search doctors..." aria-label="Search">
            </form>
        </div>
    </section>

    <div class="container" style="margin-bottom: 100px;">

        <div class="row mt-3">
            @if ($doctors->isNotEmpty())
                @foreach ($doctors as $doctor)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card doctor-card">
                            <img src="{{ Storage::url('doctor/' . $doctor->image) }}" class="p-3 pb-0" alt="Doctor image">
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
            @else
                <div class="text-center mt-5">
                    <img class="mb-3" src="{{ asset('assets/img/file.png') }}" alt="file image" width="150px">
                    <h5 class="mb-1 fw-bold mb-0" style="color: #3a3a3a;">No record found!</h5>
                    <p class="text-secondary" style="font-size: 14px;">It appears that there isn't currently a record for
                        your search!
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
