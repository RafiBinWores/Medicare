@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Blogs
@endsection

{{-- page content --}}
@section('content')
    <!-- Breadcrumb -->
    <section class="p-3" style="background-color: #023154; margin-bottom: 50px;">
        {{-- <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Find blog</li>
                </ol>
            </nav>
        </div> --}}

        {{-- Search --}}
        <div class="container mt-3">
            <form method="GET" class="d-flex mb-2" role="search">
                <input class="form-control shadow-sm py-2" type="search" name="search" value="{{ Request::get('search') }}"
                    placeholder="Search blogs..." aria-label="Search">
            </form>
        </div>
    </section>

    <div class="container" style="margin-bottom: 100px;">
        <div class="d-flex align-items-center justify-content-between shadow-sm border rounded p-3">
            <h5 class="fw-bold mb-0" style="color: #3a3a3a;">
                @if (!empty(Request::get('search')))
                    Showing result for “{{ Request::get('search') }}”
                @else
                    All blogs
                @endif
            </h5>
            <p onclick="openSidebar()" id="filter" class="mb-0 d-lg-none d-block" style="cursor: pointer;">
                <i class="fa-regular fa-filter-list text-primary pe-1"></i> Filter
            </p>
        </div>

        <div class="row mt-4">
            @if ($blogs->isNotEmpty())
                @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card blog-card">
                            <img src="{{ Storage::url('blog/' . $blog->image) }}" class="p-3 pb-0" alt="blog image">
                            <div class="card-body p-3">
                                {{-- <span class="blog-specialization">{{ $blog->specialization->name }}</span> --}}
                                <p class="card-text my-2" style="color:#023154; font-weight:600;">
                                    {{ $blog->title }}
                                </p>
                                <div
                                    style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box;  color:#3a3a3a; font-size:14px;">
                                    {!! $blog->content !!}
                                </div>

                                <a class="w-100 mt-3 btn btn-outline-primary text-center"
                                    href="{{ route('blogs.blogDetails', $blog->slug) }}">Learn more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center" style="margin-top: 120px;">
                    <img class="mb-3" src="{{ asset('assets/img/file.png') }}" alt="file image" width="150px">
                    <h5 class="mb-1 fw-bold mb-0" style="color: #3a3a3a;">No record found!</h5>
                    <p class="text-secondary" style="font-size: 14px;">It appears that there isn't currently a
                        record
                        for
                        your search!
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
