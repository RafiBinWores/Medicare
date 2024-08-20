@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    {{ $doctor->name }}
@endsection

{{-- page content --}}
@section('content')
    <div class="container mt-5" style="margin-bottom: 100px;">
        <form action="" method="POST" id="form" name="form" class="needs-validation" novalidate>
            @csrf

            <div class="row g-3">
                <div class="col-md-12 col-sm-12 col-lg-8">
                    <div class="border p-3 rounded shadow-sm">
                        <h5 class="fw-bold" style="color: #3a3a3a;">Confirm your appointment reservation</h5>
                        <hr class="pb-2">

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-medium">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control py-3" id="phone"
                                placeholder="phone" value="{{ $user->phone }}" required>
                            <p id="output" class="text-danger mt-1 mb-0" style="font-size: 12px;">
                            </p>
                            <p class="error"></p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email (optional)</label>
                            <input type="email" name="email" class="form-control py-3" id="email"
                                placeholder="email" value="{{ $user->email }}" required>
                            <p class="error"></p>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium">Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control py-3" id="name" placeholder="Name"
                                value="{{ $user->name }}" required>
                            <p class="error"></p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="age" class="form-label fw-medium">Age <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="age" class="form-control py-3" id="age"
                                        placeholder="Age" min="1" required>
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label fw-medium">Gender <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select py-3" name="gender" id="gender" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option {{ $user->gender == 'Female' ? 'selected' : '' }} value="Female">Female
                                        </option>
                                        <option {{ $user->gender == 'Male' ? 'selected' : '' }} value="Male">Male
                                        </option>
                                        <option {{ $user->gender == 'Others' ? 'selected' : '' }} value="Others">Others
                                        </option>
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label fw-medium">Note for the specialist
                                (optional)</label>
                            <textarea class="form-control" name="note" id="note" rows="5" placeholder="Write if you have any notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="border rounded shadow-sm">
                        <p class="py-3 px-4 fw-medium border-bottom">Appointment Details</p>

                        <div class="p-4 pt-0">
                            <div class="d-flex gap-3 mb-4">
                                <img src="{{ Storage::url('doctor/' . $doctor->image) }}" alt=""
                                    style="width: 50px; height:50px; border-radius:5px;">
                                <div>
                                    <p class="mb-0 fw-medium">{{ $doctor->name }}</p>
                                    <p class="mb-0 fw-medium text-secondary" style="font-size:14px;">
                                        {{ $doctor->specialization->name }}
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex gap-2 flex-row mb-3">
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

                            <div class="d-flex gap-2 flex-row mb-3">
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
                            <div class="d-flex gap-2 flex-row mb-3">
                                <i class="fa-solid fa-calendar-days text-primary fs-5"></i>
                                <div>
                                    <p class="card-text fw-medium mb-1" style="font-size: 14px; color:#3a3a3a;">
                                        {{ $appointment_date->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                            <input type="text" name="doctor_id" value="{{ $doctor->id }}" hidden>

                            <button type="submit" class="btn btn-primary w-100">Confirm</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    @endsection


    @section('customJs')
        <script>
            const input = document.querySelector("#phone");
            const output = document.querySelector("#output");

            // Initialise plugin
            const iti = window.intlTelInput(input, {
                initialCountry: "bd",
                onlyCountries: ["bd"],
                hiddenInput: () => ({
                    phone: "full_phone",
                }),
                utilsScript: "{{ asset('assets/js/intTelUtils.js') }}",
            });

            const handleChange = () => {
                let text = "";

                if (input.value) {
                    if (!iti.isValidNumber()) {
                        text = "Invalid number - please try again";
                    }
                } else {
                    text = "The number field is required.";
                }

                output.innerHTML = ""; // Clear previous output

                if (text) { // Only append if there's a message to display
                    const textNode = document.createTextNode(text);
                    output.appendChild(textNode);
                }
            };

            // Listen to "change" and "keyup" events to update validation message
            input.addEventListener('change', handleChange);
            input.addEventListener('keyup', handleChange);


            $('#form').submit(function(event) {
                event.preventDefault();

                // Check if the phone number is valid before submitting
                if (!iti.isValidNumber()) {
                    output.innerHTML = "Invalid number - please try again";
                    return; // Stop form submission if number is invalid
                }

                $('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: "{{ route('appointment.processAppointment') }}",
                    type: 'post',
                    data: $(this).serializeArray(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('button[type="submit"]').removeClass('button--loading').prop('disabled', false);

                        if (response['status'] == true) {
                            // window.location.href = "{{ url('/success/') }}/" + response.orderId;
                            location.reload();

                        } else {
                            let errors = response['errors'];
                            let card_status = response['card_status'];

                            $('.error').removeClass('invalid-feedback').html('');
                            $("input[type='text'], input[type='number'], input[type='email']").removeClass(
                                'is-invalid');

                            $.each(errors, function(key, value) {
                                $(`#${key}`).addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').html(value);
                            })

                        }

                        if (response.status) {
                            //success
                        } else {
                            $('#error-message').text(response.error);
                            console.log("Error:", response.error);
                        }
                    },
                    error: function() {
                        console.log("something wrong");
                    }
                })
            });
        </script>
    @endsection
