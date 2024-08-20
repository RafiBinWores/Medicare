@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Doctor Application Form
@endsection

@section('content')
    <!-- Breadcrumb -->
    {{-- <section class="p-3" style="background-color: #023154;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Join as doctor</li>
                </ol>
            </nav>
        </div>
    </section> --}}

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="card-body p-md-5 mx-md-4">
                            <h4 class="text-center" style="color: #3a3a3a;">Please Fill The Form</h4>
                            <hr>


                            <form class="mt-5" action="" method="POST" id="form" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                @csrf
                                <div class="d-flex flex-column flex-md-row gap-4 mb-3">
                                    <div class="mb-3">
                                        <p class=>Display Picture</p>
                                        <div class="position-relative">
                                            <img id="image-preview" src="#" alt="Image Preview" class="rounded"
                                                style="display: none; width: 150px; height:150px; object-fit:cover; z-index:10; border-radius:5px;">
                                            <button type="button" id="remove-image"
                                                class="btn btn-danger btn-sm position-absolute top-0 left-0 mt-1 ms-1 waves-effect waves-light"
                                                style="display: none;">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            <img id="demoImg" src="{{ asset('assets/img/doctor-demo.png') }}"
                                                alt="demo ambulance image"
                                                style=" width: 150px; height:150px; object-fit:cover; border-radius:5px;">
                                        </div>
                                    </div>
                                    <div class="mb-0 align-self-end">
                                        <input type="file" name="image" class="form-control" id="image" required>
                                        <p class="error"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Name" required>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="Phone Number" required>
                                            <p id="output" class="text-danger" style="font-size: 14px; margin-top:4px;">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="specialization" class="form-label">Specialization</label>
                                            <select class="form-select" name="specialization" id="specialization" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach ($specializations as $specialization)
                                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <select class="form-select" name="city" id="city" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->slug }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="services" class="form-label">Services</label>
                                    <select class="form-select select2-multiple" name="services[]" id="services"
                                        data-toggle="select2" data-width="100%" data-placeholder="Choose ..." multiple
                                        required>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="error"></p>
                                </div>

                                <div class="mb-3">
                                    <label for="experience" class="form-label">Experience</label>
                                    <input type="number" class="form-control" name="experience" id="experience"
                                        placeholder="Experience" required>
                                    <p class="error"></p>
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="education" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" id="education"
                                        placeholder="Education" required>
                                    <p class="error"></p>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="education" class="form-label">Education</label>
                                    <div id="educationFields">
                                        <div class="row mb-3 education-group">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <select name="educations[]" class="form-control" required>
                                                        <option value="">Select...</option>
                                                        @foreach ($educations as $education)
                                                            <option value="{{ $education->id }}">{{ $education->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-success addMore"><i
                                                            class="fa-solid fa-plus"></i></button>
                                                    <button type="button" class="btn btn-outline-danger removeField"><i
                                                            class="fa-solid fa-minus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="about" class="form-label">About me</label>
                                    <textarea name="about" class="form-control" id="about" cols="30" rows="5" placeholder="Type..."></textarea>
                                    <p class="error"></p>
                                </div>



                                <div class="mb-3">
                                    <label for="clinic_name" class="form-label">Clinic Name</label>
                                    <input type="text" name="clinic_name" class="form-control" id="clinic_name"
                                        placeholder="Clinic Name" required>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="clinic_address" class="form-label">Clinic Address</label>
                                    <input type="text" name="clinic_address" class="form-control" id="clinic_address"
                                        placeholder="Clinic Address" required>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="availability" class="form-label">Availability</label>
                                    <input type="text" name="availability" class="form-control" id="availability"
                                        placeholder="Availability" required>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">By contuning you agree to our
                                        trams
                                        and condition.</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit <i
                                        class="fa-regular fa-paper-plane-top"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('customJs')
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const removeImageButton = document.getElementById('remove-image');
        const demoImage = document.getElementById('demoImg');

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    removeImageButton.style.display = 'block';
                    demoImage.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageButton.addEventListener('click', function() {
            imageInput.value = null; // Clear the file input
            imagePreview.src = '#'; // Clear the image source
            imagePreview.style.display = 'none';
            removeImageButton.style.display = 'none';
            demoImage.style.display = 'block';
        });

        $(document).ready(function() {
            $('#service').select2({
                templateResult: formatOption,
                templateSelection: formatOption,
            });
        });


        // For number
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

        // Add more education btn
        $(document).ready(function() {
            function toggleRemoveButtons() {
                if ($('.education-group').length > 1) {
                    $('.removeField').show();
                } else {
                    $('.removeField').hide();
                }
            }

            $('#educationFields').on('click', '.addMore', function() {
                var newField = $('.education-group:first').clone();
                newField.find('select').val('');
                $('#educationFields').append(newField);
                toggleRemoveButtons();
            });

            $('#educationFields').on('click', '.removeField', function() {
                $(this).closest('.education-group').remove();
                toggleRemoveButtons();
            });

            // Initially call toggleRemoveButtons to set the correct state of remove buttons
            toggleRemoveButtons();
        });

        // For submitting form
        $('#form').submit(function(event) {
            event.preventDefault();

            // Check if the phone number is valid before submitting
            if (!iti.isValidNumber()) {
                output.innerHTML = "Invalid number - please try again";
                return; // Stop form submission if number is invalid
            }

            let formData = new FormData(this);
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: "{{ route('doctorForm.store') }}",
                type: 'post',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    $('button[type="submit"]').prop('disabled', false);

                    if (response['status'] == true) {
                        location.reload();

                    } else {
                        let errors = response['errors'];

                        $('.error').removeClass('invalid-feedback').html('');
                        $("input, select").removeClass(
                            'is-invalid');

                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p')
                                .addClass('invalid-feedback').html(value);
                        })

                        // Attach event listeners to remove error message on change/input
                        $("input, select").on(
                            'input',
                            function() {
                                $(this).removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html('');
                            });

                        $("input[type='file']").on('change', function() {
                            $(this).removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('');
                        });
                    }
                },
                error: function() {
                    $('button[type="submit"]').prop('disabled', false);
                    console.log("Something went wrong. Please try again.");
                }
            })
        });
    </script>
@endsection
