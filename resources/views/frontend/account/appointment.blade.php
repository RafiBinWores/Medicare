@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Appointment
@endsection

@section('content')
    <!-- Breadcrumb -->
    <section class="p-3" style="background-color: #023154; margin-bottom:50px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Edit Profile</li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="container" style="margin-bottom: 100px;">
        <div class="row gy-3">

            @include('frontend.layouts.profile-sidebar')

            <div class="col-md-12 col-lg-9">
                <div onclick="openSidebar()" id="filter" class="d-flex align-items-center shadow-sm border rounded p-3">
                    <h5 class="fw-bold mb-0" style="color: #3a3a3a;">Appointments</h5>

                    <div class="ms-3">
                        <span class="me-2 p-1 rounded fw-medium tab-btn active-tab">Upcoming</span>
                        <span class="p-1 rounded fw-medium tab-btn">Expire</span>
                    </div>
                </div>

                <div class="content-box mt-3">

                    {{-- upcoming --}}
                    <div class="content active-content">
                        <div class="row g-4">
                            @foreach ($upcomingAppointments as $upcomingAppointment)
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 border rounded shadow-sm">
                                        <div class="doctor-image">
                                            <img src="{{ Storage::url('doctor/' . $upcomingAppointment->doctor->image) }}"
                                                alt="user demo image"
                                                style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                        </div>
                                        <div class="ps-3 d-flex justify-content-between w-100">
                                            <div>
                                                <p class="fw-bold" style="color: #023154; margin-bottom: 12px;">
                                                    {{ $upcomingAppointment->doctor->name }}
                                                </p>
                                                <p class="mb-1 fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-hospitals pe-1"
                                                        style="color: #023154;"></i>{{ $upcomingAppointment->doctor->clinic_name }}
                                                </p>
                                                <p class="mb-1 text-secondary fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-location-dot pe-1"
                                                        style="color: #023154;"></i>{{ $upcomingAppointment->doctor->clinic_address }}
                                                </p>
                                                <p class="mb-1 fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-calendar-check pe-1"
                                                        style="color: #023154;"></i>Appointment On:
                                                    {{ date('M d, Y', strtotime($upcomingAppointment->appointment_date)) }}
                                                </p>
                                            </div>
                                            <a href="#" onclick="deleteAppoint({{ $upcomingAppointment->id }})">
                                                <i class="fa-regular fa-trash text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>


                    {{-- experied --}}
                    <div class="content">
                        <div class="row g-4">
                            @foreach ($expiredAppointments as $expiredAppointment)
                                <div class="col-12">
                                    <div class="d-flex align-items-center p-3 border rounded shadow-sm">
                                        <div class="doctor-image">
                                            <img src="{{ Storage::url('doctor/' . $expiredAppointment->doctor->image) }}"
                                                alt="user demo image"
                                                style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                        </div>
                                        <div class="ps-3 d-flex justify-content-between w-100">
                                            <div>
                                                <p class="fw-bold" style="color: #023154; margin-bottom: 12px;">
                                                    {{ $expiredAppointment->doctor->name }}
                                                </p>
                                                <p class="mb-1 fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-hospitals pe-1"
                                                        style="color: #023154;"></i>{{ $expiredAppointment->doctor->clinic_name }}
                                                </p>
                                                <p class="mb-1 text-secondary fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-location-dot pe-1"
                                                        style="color: #023154;"></i>{{ $expiredAppointment->doctor->clinic_address }}
                                                </p>
                                                <p class="mb-1 fw-medium" style="font-size: 14px;">
                                                    <i class="fa-regular fa-calendar-check pe-1"
                                                        style="color: #023154;"></i>Appointment On:
                                                    {{ date('M d, Y', strtotime($expiredAppointment->appointment_date)) }}
                                                </p>
                                            </div>
                                            <a href="#" onclick="deleteAppoint({{ $expiredAppointment->id }})">
                                                <i class="fa-regular fa-trash text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>
@endsection


@section('customJs')
    <script>
        // for tabs
        const tabs = document.querySelectorAll('.tab-btn');
        const all_content = document.querySelectorAll('.content');

        tabs.forEach((tab, index) => {
            tab.addEventListener("click", () => {
                tabs.forEach(tab => {
                    tab.classList.remove('active-tab')
                });
                tab.classList.add('active-tab');

                all_content.forEach(content => {
                    content.classList.remove('active-content')
                })
                all_content[index].classList.add('active-content');
            })
        })

        // delete
        function deleteAppoint(id) {
            let url = "{{ route('appointment.destroy', 'Id') }}";
            let newUrl = url.replace("Id", id);

            Swal.fire({
                    title: '<span style="color: #595959;">Are you sure?</span>',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: newUrl,
                            type: 'delete',
                            data: {},
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == true) {
                                    Swal.fire(
                                        '<span style="color: #595959;">Deleted!</span>',
                                        'User has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        // window.location.href =
                                        //     "{{ route('cities.index') }}";
                                        location.reload();
                                    })
                                } else {
                                    Swal.fire(
                                        '<span style="color: #595959;">Oops...</span>',
                                        'Something went wrong!',
                                        'error'
                                    ).then((result) => {
                                        // window.location.href =
                                        //     "{{ route('cities.index') }}";
                                        location.reload();
                                    })
                                }
                            }
                        });

                    }
                });
        };
    </script>
@endsection
