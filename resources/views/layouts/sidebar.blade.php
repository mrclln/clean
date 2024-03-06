<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item ">
            <a class="nav-link {{request()->is('home') ? 'active' : ''}}" href="{{url('home')}}">
                <i class="typcn typcn-th-small-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('enroll*') ? 'active' : ''}}" href="{{url('enroll')}}">
                <i class="typcn typcn-group-outline menu-icon"></i>
                <span class="menu-title">New Enrollees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminsubject.html">
                <i class="typcn typcn-flow-children menu-icon"></i>
                <span class="menu-title">Instructor > Subject</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admincourse.html">
                <i class="typcn typcn-flow-merge menu-icon"></i>
                <span class="menu-title">Course > Subject</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminschedule.html">
                <i class="typcn typcn-time menu-icon"></i>
                <span class="menu-title">Schedules</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminstudent.html">
                <i class="typcn typcn-user-outline menu-icon"></i>
                <span class="menu-title">Students</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admininstructor.html">
                <i class="typcn typcn-user-outline menu-icon"></i>
                <span class="menu-title">Instructors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="adminsemester.html">
                <i class="typcn typcn-arrow-shuffle menu-icon"></i>
                <span class="menu-title">Set Semester</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{(request()->is('schoolyear*')|| request()->is('semester*') || request()->is('course*')) ? 'active' : ''}}" data-toggle="collapse" href="#ssettings" aria-expanded="false" aria-controls="icons">
                <i class="typcn typcn-spanner-outline menu-icon"></i>
                <span class="menu-title">School Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ssettings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{request()->is('schoolyear*') ? 'active' : ''}}"> <a class="nav-link" href="{{url('schoolyear')}}">School Years</a></li>
                    <li class="nav-item {{request()->is('semester*') ? 'active' : ''}}"> <a class="nav-link" href="{{url('semester')}}">Semesters</a></li>
                    <li class="nav-item {{request()->is('course*') ? 'active' : ''}}"> <a class="nav-link" href="{{url('course')}} ">Courses</a></li>
                    <li class="nav-item {{request()->is('level*') ? 'active' : ''}}" > <a class="nav-link" href="{{url('level')}} ">Levels</a></li>
                    <li class="nav-item {{request()->is('section*') ? 'active' : ''}}" > <a class="nav-link" href="{{url('section')}} ">Sections</a></li>
                    <li class="nav-item"> <a class="nav-link" href=" ">Subjects</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#assettings" aria-expanded="false" aria-controls="icons">
                <i class="typcn typcn-cog-outline menu-icon"></i>
                <span class="menu-title">Access Control</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="assettings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href=" ">Roles</a></li>
                    <li class="nav-item"> <a class="nav-link" href=" ">Permissions</a></li>
                    <li class="nav-item"> <a class="nav-link" href=" ">Users</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('reports*') ? 'active' : ''}}" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="typcn typcn-business-card menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{request()->is('reports/student*') ? 'active' : ''}}"> <a class="nav-link" href="{{route('student')}} ">Students</a></li>
                    <li class="nav-item"> <a class="nav-link" href=" ">Class List</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
