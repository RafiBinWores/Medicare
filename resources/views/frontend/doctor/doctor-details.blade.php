@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    {{ $doctor->name }}
@endsection

{{-- page content --}}
@section('content')
    <div class="container mt-5" style="margin-bottom: 100px;">
        <div class="row g-3">
            <div class="col-md-12 col-sm-12 col-lg-9">
                <div class="border p-3 rounded shadow-sm">
                    <div class="d-flex gap-4">
                        <img class="doctor-img" src="{{ Storage::url('doctor/' . $doctor->image) }}" alt="Doctor image">
                        <div class="pt-1 ">
                            <span class="doctor-specialization">{{ $doctor->specialization->name }}</span>
                            <p class="card-text mt-2 mb-1 fw-bold" style="color: #3a3a3a;">
                                {{ $doctor->name }}
                            </p>
                            <div class="d-flex gap-1">
                                @foreach ($doctor->educations as $key => $education)
                                    <p class="mb-0 card-text" style="font-size: 14px; color: #4d5a68">
                                        {{ $education->abbreviation }}{{ $key < count($doctor->educations) - 1 ? ',' : '.' }}
                                    </p>
                                @endforeach
                            </div>

                            <p class="card-text text-primary fw-medium mb-1" style="font-size: 14px;">
                                {{ $doctor->experience }} Years of Experience
                            </p>

                            <div class="d-none d-lg-flex gap-2 mt-3">

                                <div class="d-flex gap-2 flex-row">
                                    <i class="fa-regular fa-hospitals text-primary fs-5"></i>
                                    <div>
                                        <p class="card-text fw-medium mb-1" style="font-size: 14px; color:#3a3a3a;">
                                            {{ $doctor->clinic_name }}
                                        </p>
                                        <p class="text-secondary" style="font-size: 14px;">
                                            {{ $doctor->clinic_address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 flex-row">
                                    <i class="fa-regular fa-clock text-primary fs-5"></i>
                                    <div>
                                        <p class="card-text fw-medium mb-1" style="font-size: 14px; color:#3a3a3a;">
                                            Availability
                                        </p>
                                        <p class="text-secondary" style="font-size: 14px;">
                                            {{ $doctor->availability }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="mt-4">
                        <p class="mb-2 fw-medium" style="color: #023154;">About</p>
                        <p class="mb-0 text-secondary" style="font-size: 14px;">
                            {{ $doctor->about }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 border-bottom border-2 pb-2 px-3">
                    <span class="me-2 fw-medium doctor-tab-btn doctor-active-tab">Info</span>
                    {{-- <span class="ps-3 fw-medium doctor-tab-btn">Feedback</span> --}}
                </div>

                <div class="content-box mt-4">
                    <div class="p-3 content active-content">
                        <div class="mb-4">
                            <p class="mb-3 fw-medium" style="color: #023154;">Field of Concentration</p>
                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-sm-12 col-lg-4">
                                        <li class="mb-2" style="font-size: 14px; list-style-type: disc;">
                                            <span class="text-secondary">{{ $service->name }}</span>
                                        </li>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="mb-4">
                            <p class="mb-3 fw-medium" style="color: #023154;">Specializations</p>
                            <ul class="ps-4">
                                <li class="mb-2" style="font-size: 14px; list-style-type: disc;">
                                    <span class="text-secondary">{{ $doctor->specialization->name }}</span>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="mb-4">
                            <p class="mb-3 fw-medium" style="color: #023154;">Education</p>
                            <ul class="ps-4">
                                @foreach ($doctor->educations as $education)
                                    <li class="mb-2" style="font-size: 14px; list-style-type: disc;">
                                        <span class="text-secondary">{{ $education->name }} -
                                            {{ $education->abbreviation }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>



                    <div class="content">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 border rounded shadow-sm">
                                    <img src="assets/img/doctor-img01.png" alt=""
                                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                    <div class="ps-3">
                                        <p class="fw-bold" style="color: #023154; margin-bottom: 12px;">Doctor test
                                            base</p>
                                        <p class="mb-1 text-secondary fw-medium" style="font-size: 14px;">
                                            <i class="fa-regular fa-location-dot pe-1" style="color: #023154;"></i>Address
                                        </p>
                                        <p class="mb-1 fw-medium" style="font-size: 14px;">
                                            <i class="fa-regular fa-calendar-check pe-1"
                                                style="color: #023154;"></i>Appointment On:
                                        </p>
                                        <p class="mb-1 fw-medium" style="font-size: 14px;">
                                            <i class="fa-regular fa-clock pe-1" style="color: #023154;"></i>At Time:
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-12 col-sm-12 col-lg-3">
                <div class="rounded border shadow-sm">
                    <div class="d-flex align-items-center justify-content-between mb-2 p-3">
                        {{-- <p class="mb-0 fw-medium">Ticket price</p>
                        <p class="mb-0 fw-medium">700tk</p> --}}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label fw-medium" for="flexRadioDefault2">
                                Pay later
                            </label>
                        </div>
                    </div>
                    <form action="{{ route('appointment.index', $doctor->id) }}" method="POST">
                        @csrf
                        @method('post')
                        {{-- <input type="date" name="appointment_date" id="constrained" data-inline="true"
                            data-open-on="today" hidden> --}}

                        <div class="p-3 pt-0">
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div>


                        <div class="px-3 mb-3">
                            <button type="submit" class="btn btn-primary w-100"><i
                                    class="fa-solid fa-calendar-days"></i>
                                Shedule
                                Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection


    @section('customJs')
        <script>
            // for tabs
            const tabs = document.querySelectorAll('.doctor-tab-btn');
            const all_content = document.querySelectorAll('.content');

            tabs.forEach((tab, index) => {
                tab.addEventListener("click", () => {
                    tabs.forEach(tab => {
                        tab.classList.remove('doctor-active-tab')
                    });
                    tab.classList.add('doctor-active-tab');

                    all_content.forEach(content => {
                        content.classList.remove('active-content')
                    })
                    all_content[index].classList.add('active-content');
                })
            });

            // date picker
            var constrained = new Datepicker('#constrained', {

                // 10 days in the past
                min: (function() {
                    var date = new Date();
                    date.setDate(date.getDate() - 1);
                    return date;
                })(),

            });

            $(document).ready(function() {
                $('#addMore').click(function() {
                    $('#educationFields').append(
                        '<div class="education-group mb-2"><div class="form-group"><input type="text" name="educations[]" class="form-control" required></div><button type="button" class="btn btn-danger removeField">Remove</button></div>'
                    );
                });

                $(document).on('click', '.removeField', function() {
                    $(this).closest('.education-group').remove();
                });
            });
        </script>
    @endsection
