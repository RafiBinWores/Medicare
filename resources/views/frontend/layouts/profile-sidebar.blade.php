<div class="col-lg-3">
    <div class="shadow-sm border rounded p-3">
        <div class="d-flex align-items-center mb-lg-5 mb-3">
            <div class="pe-3">
                @if ($user->image == null)
                    <i class="fa-light fa-user fs-2"></i>
                @else
                    <img src="{{ Storage::url('profile/' . $user->image) }}" alt=""
                        style="width: 60px; height: 60px; border-radius: 5px; object-fit: cover;">
                @endif
            </div>
            <div>
                <p class="mb-0 fw-bold">My Dashboard</p>
                <p class="mb-0 text-secondary" style="font-size: 14px;">{{ $user->name }}</p>
            </div>
        </div>

        <div class="profile-sidebar-menu">
            <div class="mb-2">
                <a class="profile-sidebar-link {{ request()->routeIs('appointment.userAppointments') ? 'active' : '' }}"
                    href="{{ route('appointment.userAppointments') }}">
                    <i class="fa-regular fa-calendar-check pe-2"></i>Appointments
                </a>
            </div>
            @if ($user->role == 'doctor')
                <div class="mb-2">
                    <a class="profile-sidebar-link {{ request()->routeIs('appointment.doctorAppointments') ? 'active' : '' }}"
                        href="{{ route('appointment.doctorAppointments') }}">
                        <i class="fa-regular fa-calendar-check pe-2"></i>Your Appointments
                    </a>
                </div>
            @endif
            <div class="mb-2">
                <a class="profile-sidebar-link {{ request()->routeIs(['account.profile', 'account.editProfile']) ? 'active' : '' }}"
                    href="{{ route('account.profile') }}">

                    <i class="fa-regular fa-gear pe-2"></i>Profile Settings
                </a>
            </div>
            <div class="mb-2">
                <a class="profile-sidebar-link {{ request()->routeIs('account.changePassword') ? 'active' : '' }}"
                    href="{{ route('account.changePassword') }}">
                    <i class="fa-regular fa-lock pe-2"></i>Change Password
                </a>
            </div>
            <div class="mb-2">
                <a class="profile-sidebar-link" href="">
                    <i class="fa-regular fa-right-from-bracket pe-2"></i>Log out
                </a>
            </div>
        </div>
    </div>
</div>
