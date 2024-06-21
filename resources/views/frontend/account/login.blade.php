<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Doctor</title>

    <!-- Front Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/login.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css" rel="stylesheet" />
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
                                            <h4 class="mt-3 mb-5 pb-1">Welcome back to Medicare</h4>
                                        </div>

                                        <form method="post" action="{{ route('account.authenticate') }}">
                                            @csrf
                                            <p>Please login to your account</p>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" />
                                                <label class="form-label" for="email">Email</label>

                                                @error('email')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" name="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror" />

                                                <span class="eye" onclick="myFunction()">
                                                    <i id="eye" class="fa-regular fa-eye"></i>
                                                    <i id="eyeSlash" class="fa-regular fa-eye-slash"></i>
                                                </span>

                                                <label class="form-label" for="password">Password</label>

                                                @error('password')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    type="submit">Log
                                                    in</button>
                                                <a class="text-muted" href="#!">Forgot password?</a>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                <a href="{{ route('account.registration') }}" type="button"
                                                    class="btn btn-outline-primary">Create
                                                    new</a>
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

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.umd.min.js"></script>
    <script src="{{ asset('assets/js/sweet-alert.min.js') }}"></script>
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
                timer: 1500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'success',
                title: 'Success',
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

    <script>
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
    </script>
</body>

</html>
