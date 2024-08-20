@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Edit Profile
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
                <div class="d-flex align-items-center justify-content-between shadow-sm border rounded p-3">
                    <h5 class="fw-bold mb-0" style="color: #3a3a3a;">Edit Profile</h5>
                </div>


                <div class="shadow-sm border rounded p-3 my-3">

                    <form action="" method="POST" id="form" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        @method('put')

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
                                    @if ($user->image == null)
                                        <img id="demoImg" src="{{ asset('assets/img/doctor-demo.png') }}"
                                            alt="demo ambulance image"
                                            style=" width: 150px; height:150px; object-fit:cover; border-radius:5px;">
                                    @else
                                        <img id="demoImg" src="{{ Storage::url('profile/' . $user->image) }}"
                                            alt="demo ambulance image"
                                            style=" width: 150px; height:150px; object-fit:cover; border-radius:5px;">
                                    @endif
                                </div>
                            </div>
                            <div class="mb-0 align-self-end">
                                <input type="file" name="image" class="form-control" id="image" required>
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div>
                                    <label for="name" class="form-label fw-medium">Name</label>
                                    <input type="text" name="name" class="form-control py-3" id="name"
                                        placeholder="Name" value="{{ $user->name }}" required>
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div>
                                    <label for="phone" class="form-label fw-medium">Phone</label>
                                    <input type="text" name="phone" class="form-control py-3" id="phone"
                                        placeholder="phone" value="{{ $user->phone }}" required>
                                    <p id="output" class="text-danger mt-1 mb-0" style="font-size: 12px;">
                                    </p>
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" name="email" class="form-control py-3" id="email"
                                    placeholder="email" value="{{ $user->email }}" readonly required>
                                <p class="error"></p>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div>
                                    <label for="dob" class="form-label fw-medium">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control py-3" id="dob"
                                        placeholder="dob" value="{{ $user->date_of_birth }}" required>
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div>
                                    <label for="gender" class="form-label fw-medium">Gender</label>
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
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div>
                                    <label for="blood_group" class="form-label fw-medium">Blood Group</label>
                                    <select class="form-select py-3" name="blood_group" id="blood_group" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option {{ $user->blood_group == 'A-' ? 'selected' : '' }} value value="A-">A-
                                        </option>
                                        <option {{ $user->blood_group == 'A+' ? 'selected' : '' }} value="A+">A+
                                        </option>
                                        <option {{ $user->blood_group == 'AB-' ? 'selected' : '' }} value="AB-">AB-
                                        </option>
                                        <option {{ $user->blood_group == 'AB+' ? 'selected' : '' }} value="AB+">AB+
                                        </option>
                                        <option {{ $user->blood_group == 'B-' ? 'selected' : '' }} value="B-">B-
                                        </option>
                                        <option {{ $user->blood_group == 'B+' ? 'selected' : '' }} value="B+">B+
                                        </option>
                                        <option {{ $user->blood_group == 'O-' ? 'selected' : '' }} value="O-">O-
                                        </option>
                                        <option {{ $user->blood_group == 'O+' ? 'selected' : '' }} value="O+">O+
                                        </option>
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="city" class="form-label fw-medium">City</label>
                            <select class="form-select py-3" name="city" id="city" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $city->id == $user->city_id ? 'selected' : '' }}>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                            <p class="error"></p>
                        </div>

                        <div class="p-3 mt-2 mb-4 rounded" style="background-color: #f8f8fa;">
                            <div class="form-check mb-2 form-check-primary">
                                <input type="hidden" name="blood_donor" value="no">
                                <input class="form-check-input p-2" type="checkbox" name="blood_donor" value="yes"
                                    id="blood_donor" {{ $user->blood_donor == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="blood_donor">
                                    <p class="fw-medium mb-1" style="color: #3a3a3a;">
                                        Include me as a blood donor in this system.</p>
                                    <p class="mb-0 text-secondary" style="font-size: 12px;">
                                        You can help others donating blood when necessary.
                                    </p>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="px-3 py-2" href="{{ route('account.profile') }}">Cancle</a>
                            <button type="submit" class="btn btn-primary fw-light px-3 py-2">Save</button>
                        </div>
                    </form>
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
            imageInput.value = null;
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
            removeImageButton.style.display = 'none';
            demoImage.style.display = 'block';
        });

        // phone number
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
                url: "{{ route('account.updateProfile', $user->id) }}",
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
