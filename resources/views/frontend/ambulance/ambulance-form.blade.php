@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Ambulance Application Form
@endsection

@section('content')
    <!-- Breadcrumb -->
    {{-- <section class="p-3" style="background-color: #023154;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">join as ambulance provider</li>
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
                                <div class="d-flex flex-column flex-lg-row gap-4">
                                    <div class="mb-3">
                                        <p class="fw-medium">Display Picture</p>
                                        <div class="position-relative">
                                            <img id="image-preview" src="#" alt="Image Preview" class="rounded"
                                                style="display: none; width: 150px; height:150px; object-fit:cover; z-index:10; border-radius:5px;">
                                            <button type="button" id="remove-image"
                                                class="btn btn-danger btn-sm position-absolute top-0 left-0 mt-1 ms-1 waves-effect waves-light"
                                                style="display: none;">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            <img id="demoImg" src="{{ asset('assets/img/demo-ambulance.png') }}"
                                                alt="demo ambulance image"
                                                style=" width: 150px; height:150px; object-fit:cover; border-radius:5px;">
                                        </div>
                                    </div>
                                    <div class="mb-md-3 mb-0 align-self-end">
                                        <input type="file" name="image" class="form-control" id="image" required>
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name" required>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Phone Number" required>
                                    <p id="output" class="text-danger" style="font-size: 14px; margin-top:4px;">
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label fw-medium">City</label>
                                    <select class="form-select" name="city" id="city" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label fw-medium">Address</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Address" required>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">By contuning you agree to our trams
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

        // For number
        const input = document.querySelector("#phone");
        const output = document.querySelector("#output");

        // initialise plugin
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
                text = "The number field is reguired.";
            }

            output.innerHTML = ""; // Clear previous output

            if (text) { // Only append if there's a message to display
                const textNode = document.createTextNode(text);
                output.appendChild(textNode);
            }
        };


        // listen to "keyup", but also "change" to update when the user selects a country
        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);


        // For submitting form
        $('#form').submit(function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: "{{ route('ambulanceForm.store') }}",
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
