<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Mini Project</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MP</a>
        </div>
        <ul class="sidebar-menu">
            <li
                class="dropdown
                {{ request()->is('dashboard/division') ? 'active' : '' }}
                {{ request()->is('dashboard/employee') ? 'active' : '' }}
                {{ request()->is('dashboard/schedule') ? 'active' : '' }}
                {{ request()->is('dashboard/payroll') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Master</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ request()->is('dashboard/division') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('division.index') }}">Division</a></li>
                    <li class="{{ request()->is('dashboard/employee') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('employee.index') }}">Employee</a></li>
                    <li class="{{ request()->is('dashboard/schedule') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('schedule.index') }}">Schedule</a></li>
                    <li class="{{ request()->is('dashboard/payroll') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('payroll.index') }}">Payroll</a></li>
                </ul>
            </li>
            <li class="{{ request()->is('dashboard/attendance/create') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('attendance.create') }}"><i class="far fa-square"></i>
                    <span>Attendance</span></a></li>

            <li class="{{ request()->is('dashboard/attendance') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('attendance.index') }}"><i class="far fa-square"></i>
                    <span>Attendance Data</span></a></li>

            <li class="{{ request()->is('dashboard/report') ? 'active' : '' }}"><a class="nav-link"
                    href={{ route('report.index') }}><i class="far fa-square"></i>
                    <span>Report</span></a></li>
        </ul>
    </aside>
</div>
