<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('dashboard')}}">
            <img src="{{asset('assets/img/Itta1.png')}}" width="160px" />
{{--            <span class="align-middle">ITTAEDU</span>--}}
        </a>

        <ul class="sidebar-nav">
{{--            <li class="sidebar-header">--}}
{{--                Pages--}}
{{--            </li>--}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.enrollment')}}">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Enrollments</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.courses')}}">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Courses</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.mailtemplate')}}">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Mail Template</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('enrollment')}}">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Visit Enrollment Page</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.logout')}}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign out</span>
                </a>
            </li>


            {{--            <li class="sidebar-item">--}}
{{--                <a class="sidebar-link" href="#">--}}
{{--                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Admins</span>--}}
{{--                </a>--}}
{{--            </li>--}}

        </ul>

    </div>
</nav>
