@extends('frontend.layouts.app')

{{-- Page title --}}
@section('pageTitle')
    Profile
@endsection

@section('content')
    <!-- Breadcrumb -->
    <section class="p-3" style="background-color: #023154; margin-bottom:50px;">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-secondary active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="container" style="margin-bottom: 100px;">
        <div class="row gy-3">

            @include('frontend.layouts.profile-sidebar')

            <div class="col-md-12 col-lg-9">
                <div class="d-flex align-items-center justify-content-between shadow-sm border rounded p-3">
                    <h5 class="fw-bold mb-0" style="color: #3a3a3a;">Profile</h5>
                    <a href="{{ route('account.editProfile') }}" class="mb-0 text-primary" style="cursor: pointer;">
                        <i class="fa-regular fa-pen-to-square pe-1"></i> Edit
                    </a>
                </div>


                <div class="shadow-sm border rounded p-3 my-3">
                    <div class="d-flex align-items-center">
                        <div class="user-image">
                            @if ($user->image == null)
                                <i class="fa-light fa-user ps-3" style="font-size: 100px;"></i>
                            @else
                                <img src="{{ Storage::url('profile/' . $user->image) }}" alt="Doctor Profile Image"
                                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                            @endif


                        </div>
                        <div class="profile-info ps-4">
                            <h5 class="mb-1 fw-bold" style="color: #023154; margin-bottom: 12px;">
                                {{ $user->name ?? 'N/A' }}</h5>
                            <p class="mb-1 text-secondary" style="font-size: 14px;">{{ $user->phone }}</p>
                            <p class="text-secondary" style="font-size: 14px;">{{ $user->email ?? 'N/A' }}</p>
                            <p class="mb-1 text-secondary" style="font-size: 14px;">{{ $user->gender ?? 'N/A' }}</p>
                            <p class="mb-1 text-secondary" style="font-size: 14px;">{{ $user->blood_group ?? 'N/A' }}
                            </p>
                            <p class="mb-1 text-secondary" style="font-size: 14px;">
                                @if ($user->is_blood_donor == 'no')
                                    (Excluded as a voluntary blood
                                    donor)
                                @else
                                    (Included as a voluntary blood
                                    donor)
                                @endif
                            </p>
                        </div>
                    </div>
                </div {{-- <div class="shadow-sm border rounded p-3">
                    <div class="d-flex align-items-center">


                    </div>
                </div> --}} </div>
            </div>
        </div>

        <!-- Mobile sidebar overlay -->
        <div class="overlay" id="overlay" onclick="closeSidebar()"></div>
    @endsection
