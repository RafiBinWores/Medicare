@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Blogs
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    {{-- <section class="p-3" style="background-color: #023154; margin-bottom: 50px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Find blog</li>
                </ol>
            </nav>
        </div>
    </section> --}}

    <div class="container" style="margin-bottom: 100px; margin-top: 60px;">


        <div class="blog-image-holder d-flex justify-content-center mb-5">
            <img class="rounded w-100 object-fit-cover" src="{{ Storage::url('blog/' . $blog->image) }}" alt="image"
                style="max-height: 550px;">
        </div>

        <div class="blog-title text-center">
            <h3 class="fw-bold t-gray mb-5">{{ $blog->title }}</h3>
        </div>

        <div>
            {!! $blog->content !!}
        </div>

    </div>
@endsection
