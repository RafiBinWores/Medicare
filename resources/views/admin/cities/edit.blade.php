@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Edit City
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Edit City
@endsection

{{-- page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Basic Information</h4>

            <form action="" method="POST" id="from" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">City Name</label>
                    <input type="text" class="form-control" id="name" placeholder="City Name" name="name"
                        value="{{ $city->name }}" required>
                    <p class="error"></p>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('cities.index') }}" type="reset" class="btn btn-secondary waves-effect">Cancel</a>
            </form>

        </div> <!-- end card-body-->
    </div>
@endsection


@section('customJs')
    <script>
        // For submitting form
        $('#from').submit(function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: "{{ route('cities.update', $city->id) }}",
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
