<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle') | Medicare</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Front Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- intl-tel-input css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/intTelInput.css') }}">

    {{-- DatePicker --}}
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.material.css') }}">

    {{-- Select2 --}}
    <link href="{{ asset('admin-assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('customCSS')
</head>

<body>

    <!-- Header section -->
    @include('frontend.layouts.header')

    <main>
        @yield('content')
    </main>

    <!-- footer -->
    @include('frontend.layouts.footer')

    <script src="{{ asset('admin-assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/intTelInput.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // blog slide animation
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            centerSlide: 'true',
            grabCursor: 'true',
            fade: 'true',
            autoplay: {
                delay: 2500,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
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


    @yield('customJs')

</body>

</html>
