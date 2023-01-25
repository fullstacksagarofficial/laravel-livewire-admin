<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('admin_assets/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@yield('select_dashboard')">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="@yield('select_category')">
                    <a href="{{ url('admin/category') }}">
                        <i class="fas fa-table"></i>Category</a>
                </li>

                <li class="@yield('select_user')">
                    <a href="{{ url('admin/users') }}">
                        <i class="fas fa-user"></i>Users</a>
                </li>
                
                <li class="@yield('select_appointment')">
                    <a href="{{ url('admin/appointments') }}">
                        <i class="fas fa-user"></i>Appointments</a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
