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
                    <h5 class="fw-bold mb-0" style="color: #3a3a3a;">Chnage Password</h5>
                </div>


                <div class="shadow-sm border rounded p-3 my-3">

                    <form action="" method="POST" id="form" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="old_password" class="form-label fw-medium">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="old_password"
                                placeholder="Old Password" required>
                            <p class="error"></p>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label fw-medium">New Password</label>
                            <input type="password" name="new_password" class="form-control" id="new_password"
                                placeholder="New Password" required>
                            <p class="error"></p>
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="form-label fw-medium">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password"
                                placeholder="Confirm Password" required>
                            <p class="error"></p>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary fw-light ">Save</button>
                            <a class=" btn btn-outline-primary" href="{{ route('account.profile') }}">Cancle</a>
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
        $('#form').submit(function(event) {
            event.preventDefault();
            let formArray = $(this).serializeArray();
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: "{{ route('account.updatePassword') }}",
                type: 'post',
                data: formArray,
                dataType: 'json',
                success: function(response) {
                    $('button[type="submit"]').prop('disabled', false);

                    if (response['status'] == true) {
                        location.reload();
                    } else {
                        let errors = response['errors'];

                        $('.error').removeClass('invalid-feedback').html('');
                        $("input[type='text']").removeClass('is-invalid');

                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p')
                                .addClass('invalid-feedback').html(value);
                        })
                    }
                },
                error: function() {
                    $('button[type="submit"]').prop('disabled', false);
                    console.log("something wrong");
                }
            })
        });
    </script>
@endsection
