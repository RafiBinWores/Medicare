<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Lists</li>

                <li>
                    <a href="apps-calendar.html">
                        <i class="fe-users"></i>
                        <span> Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cities.index') }}">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span> Cities </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('educations.index') }}">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span> Educations </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}">
                        <i class="mdi mdi-format-list-checkbox"></i>
                        <span> Services </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('specializations.index') }}">
                        <i class="mdi mdi-account-star-outline"></i>
                        <span> Specilizations </span>
                    </a>
                </li>
                <li>
                    <a href="#ambulance" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                        <i class="mdi mdi-ambulance"></i>
                        <span> Ambulance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="ambulance" style="">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('ambulances.index') }}">Ambulances</a>
                            </li>
                            <li>
                                <a href="{{ route('ambulances.pending') }}">Approve Request</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#doctor" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                        <i class="mdi mdi-doctor"></i>
                        <span> Doctor </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="doctor" style="">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('doctors.index') }}">Doctors</a>
                            </li>
                            <li>
                                <a href="{{ route('doctors.pending') }}">Approve Request</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span> Blogs </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
