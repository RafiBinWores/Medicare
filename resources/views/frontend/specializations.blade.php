@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Book appointment, ambulance service and blood donor online
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    {{-- <section class="p-3" style="background-color: #023154; margin-bottom: 50px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Specializations</li>
                </ol>
            </nav>
        </div>
    </section> --}}

    <div class="container" style="margin-top: 50px; margin-bottom: 100px;">
        <h4 class="fw-bold mb-3" style="color: #3a3a3a;">Doctor Specializations</h4>

        {{-- Search --}}
        <form method="GET" class="d-flex mb-2" role="search">
            <input class="form-control shadow-sm py-2" type="search" name="keyword" value="{{ Request::get('keyword') }}"
                placeholder="Search..." aria-label="Search">
        </form>

        <div class="row text-center">
            @if ($specializations->isNotEmpty())
                @foreach ($specializations as $specialization)
                    <a href="{{ route('specializations.specializedDoctor', $specialization->slug) }}"
                        class="col-6 col-md-4 col-lg-2 mt-3">
                        <div class="specialization-card">
                            <img src="{{ Storage::url('specialization/' . $specialization->image) }}"
                                alt="{{ $specialization->name }}">
                            <p>{{ $specialization->name }}</p>
                        </div>
                    </a>
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

    <!-- Mobile sidebar overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>
@endsection
