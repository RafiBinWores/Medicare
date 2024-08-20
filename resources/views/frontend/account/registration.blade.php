<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Doctor</title>

    <!-- Front Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/login.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/intTelInput.css') }}">


    <style>
        /*============== Sweet alert style ================*/
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }
    </style>
</head>

<body>

    <main>
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">

                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/logo.png') }}" style="width: 185px;"
                                                alt="logo">
                                            <h4 class="mt-3 mb-5 pb-1">Welcome to Medicare</h4>
                                        </div>

                                        <form method="POST" id="registrationForm" name="registrationForm"
                                            class="need-validation" novalidate>
                                            @csrf
                                            <p>Create your free account</p>

                                            <div class="mb-4">
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    required>
                                                <p id="output" class="text-danger mt-1 mb-0"
                                                    style="font-size: 12px;">
                                                </p>
                                                <p class="error" style="font-size: 12px;"></p>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    required />
                                                <label class="form-label" for="email">Email</label>

                                                <p class="error" style="font-size: 12px;"></p>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" required />

                                                <span class="eye" onclick="myFunction()">
                                                    <i id="eye" class="fa-regular fa-eye"></i>
                                                    <i id="eyeSlash" class="fa-regular fa-eye-slash"></i>
                                                </span>

                                                <label class="form-label" for="password">Password</label>
                                                <p class="error" style="font-size: 12px;"></p>
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    id="btn" type="submit">Sign Up</button>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Already have an account?</p>
                                                <a href="{{ route('account.login') }}"
                                                    class="btn btn-outline-primary">Sign in</a>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                        <h4 class="mb-4">We are more than just a company</h4>
                                        <p class="small mb-0">
                                            Find & Book Appointments with Your Favorite Doctors, Ambulance Services, and
                                            Blood Donors.
                                            Say goodbye to endless phone calls and long queues. Book doctors'
                                            appointments, ambulance
                                            service, manage medical records, find blood donor and more. Take the first
                                            step towards
                                            better health.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.umd.min.js"></script>
    <script src="{{ asset('admin-assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/intTelInput.js') }}"></script>

    <script>
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

        // password view/hide
        function myFunction() {
            let input = document.getElementById('password');
            let eye = document.getElementById('eye');
            let eyeSlash = document.getElementById('eyeSlash');

            if (input.type == 'password') {
                input.type = 'text';
                eyeSlash.style.display = 'block';
                eye.style.display = 'none'
            } else {
                input.type = 'password';
                eyeSlash.style.display = 'none';
                eye.style.display = 'block'
            }
        }

        // For submitting form
        $('#registrationForm').submit(function(event) {
            handleChange(); // Ensure the handleChange function is called to update the message
            if (!iti.isValidNumber()) {
                event.preventDefault(); // Prevent form submission if the number is not valid
                return; // Exit the function early
            }

            event.preventDefault();

            $('button[type="submit"]').prop('disable', true);

            $.ajax({
                url: "{{ route('account.processRegistration') }}",
                type: 'post',
                data: $("#registrationForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response['status'] == true) {
                        window.location.href = "{{ route('frontend.home') }}";

                    } else {
                        let errors = response['errors'];
                        location.reload();

                        $('.error').removeClass('invalid-feedback').html('');
                        $("input[type='email'], input[type='password']").removeClass('is-invalid');

                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p')
                                .addClass('invalid-feedback').html(value);
                        });

                        // Attach event listeners to remove error message on change/input
                        $("input").on(
                            'input',
                            function() {
                                $(this).removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html('');
                            });

                    }
                },

                error: function() {
                    console.log("something wrong");
                }
            })
        });
    </script>

    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}",
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'error',
                title: "{{ Session::get('error') }}",
            })
        </script>
    @endif

</body>

</html>
