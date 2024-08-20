@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Ambulances
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    <section class="p-3" style="background-color: #023154; margin-bottom: 50px;">
        {{-- <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Find ambulance</li>
                </ol>
            </nav>
        </div> --}}

        {{-- Search --}}
        <div class="container mt-3">
            <form method="GET" class="d-flex mb-2" role="search">
                <input class="form-control shadow-sm py-2" type="search" name="search" value="{{ Request::get('search') }}"
                    placeholder="Search ambulance..." aria-label="Search">
            </form>
        </div>
    </section>

    <div class="container" style="margin-bottom: 100px;">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar" id="sidebar">
                    <i class="fa-solid fa-xmark" id="close" onclick="closeSidebar()"></i>
                    <p class="fw-medium border-bottom p-3" style="color: #3a3a3a;">Cities</p>


                    <form action="" method="post" class="p-3 pt-0">
                        @foreach ($cities as $city)
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input city-checkbox" name="city[]"
                                    value="{{ $city->id }}" id="city-{{ $city->id }}"
                                    {{ in_array($city->id, $cityArr) ? 'checked' : '' }}>

                                <label class="checkbox-entry" for="city-{{ $city->id }}">
                                    <span>{{ $city->name }}</span>
                                </label>
                            </div>
                        @endforeach

                    </form>
                </div>

            </div>
            <div class="col-md-12 col-lg-9">
                <div class="d-flex align-items-center justify-content-between shadow-sm border rounded p-3">
                    <h5 class="fw-bold mb-0" style="color: #3a3a3a;">
                        @if (!empty(Request::get('search')))
                            Showing result for “{{ Request::get('search') }}”
                        @else
                            All Ambulance
                        @endif
                    </h5>
                    <p onclick="openSidebar()" id="filter" class="mb-0 d-lg-none d-block" style="cursor: pointer;">
                        <i class="fa-regular fa-filter-list text-primary pe-1"></i> Filter
                    </p>
                </div>

                <div class="row">
                    @if ($ambulances->isNotEmpty())
                        @foreach ($ambulances as $ambulance)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card doctor-card mt-3">
                                    <img src="{{ Storage::url('ambulance/' . $ambulance->image) }}"
                                        class="rounded-1 p-3 pb-0" alt="Doctor image">
                                    <div class="card-body p-3">
                                        <span class="doctor-specialization">{{ $ambulance->city->name }}</span>
                                        <p class="card-text mt-2 mb-1 fw-bold">
                                            {{ $ambulance->name }}
                                        </p>
                                        <p class="card-text text-primary fw-medium mb-1" style="font-size: 14px;">
                                            {{ $ambulance->phone }}
                                        </p>
                                        <p class="card-text" style="font-size: 14px;">
                                            {{ $ambulance->address }}
                                        </p>

                                        {{-- <a class="w-100 btn btn-outline-primary text-center" href="">Book Now</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center" style="margin-top: 120px;">
                            <img class="mb-3" src="{{ asset('assets/img/file.png') }}" alt="file image" width="150px">
                            <h5 class="mb-1 fw-bold mb-0" style="color: #3a3a3a;">No record found!</h5>
                            <p class="text-secondary" style="font-size: 14px;">It appears that there isn't currently a
                                record
                                for
                                your search!
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>
@endsection


@section('customJs')
    <script>
        function openSidebar() {
            document.getElementById('sidebar').style.right = '0';
            document.getElementById('close').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            document.body.classList.add('no-scroll');
        }

        function closeSidebar() {
            document.getElementById('sidebar').style.right = '-280px';
            document.getElementById('close').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            document.body.classList.remove('no-scroll');
        }

        window.onscroll = function() {
            var sidebar = document.getElementById('sidebar');
            var sidebarTop = sidebar.offsetTop;

            // Adjust top position to make it fixed after scrolling
            if (window.pageYOffset > sidebarTop) {
                sidebar.classList.add('fixed');
            } else {
                sidebar.classList.remove('fixed');
            }
        };

        // Handle brand checkbox changes
        $('.city-checkbox').change(function() {
            apply_filters();
        });

        // Filters
        function apply_filters() {
            let cities = [];

            $('.city-checkbox:checked').each(function() {
                cities.push($(this).val());
            });
            let url = "{{ url()->current() }}?";

            if (cities.length > 0) {
                window.location.href = url + '&city=' + cities.toString();
            } else {
                window.location.href = url;
            }
        }
    </script>
@endsection
