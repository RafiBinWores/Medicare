@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Edit Specialization
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Edit Specialization
@endsection

{{-- page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Basic Information</h4>

            <form action="" method="POST" id="from" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Blog Title" name="title"
                        value="{{ $blog->title }}" required>
                    <p class="error"></p>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Blog content</label>
                    <div id="content_editor" style="height:250px;">{!! $blog->content !!}</div>
                    <textarea name="content" id="content" class="form-control" style="display:none;" required>{!! $blog->content !!}</textarea>
                    <p class="error"></p>
                </div>
                <div class="mb-3">
                    <label for="blogStatus" class="form-label">Status</label>
                    <select class="form-select" name="blogStatus" id="blogStatus" required>
                        <option selected disabled value="">Choose...</option>
                        <option {{ $blog->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ $blog->status == 2 ? 'selected' : '' }} value="2">Block</option>
                    </select>
                    <p class="error"></p>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Blog Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    {{-- <div class="form-text">Recommended image size for upload is 128x128 px.</div> --}}
                    <p class="error"></p>
                </div>
                <div class="mb-3">
                    <div class="position-relative">
                        <img id="image-preview" src="{{ Storage::url('blog/' . $blog->image) }}" alt="Image Preview"
                            style="@if ($blog->image == null) display: none @endif; max-width: 200px;" multiple>
                        <button type="button" id="remove-image"
                            class="btn btn-danger btn-xs position-absolute top-0 left-0 mt-1 ms-1 waves-effect waves-light"
                            style="display: none;">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('specializations.index') }}" type="reset"
                    class="btn btn-secondary waves-effect">Cancel</a>
            </form>

        </div> <!-- end card-body-->
    </div>
@endsection


@section('customJs')
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const removeImageButton = document.getElementById('remove-image');

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    removeImageButton.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageButton.addEventListener('click', function() {
            imageInput.value = null; // Clear the file input
            imagePreview.src = '#'; // Clear the image source
            imagePreview.style.display = 'none';
            removeImageButton.style.display = 'none';
        });

        // For submitting form
        $('#from').submit(function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: "{{ route('blogs.update', $blog->id) }}",
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
