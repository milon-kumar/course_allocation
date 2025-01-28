<div class="leftside-menu">
    @if ($user->role == 'admin')
        <a href="{{route('admin.dashboard')}}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm.png" alt="" height="50">
            </span>
        </a>
        <a href="{{route('admin.dashboard')}}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo-dark.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm_dark.png" alt="" height="50">
            </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar="">
            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="{{route("admin.dashboard")}}" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Dashbaord </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item">Apps</li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.department.index') }}" class="side-nav-link">
                        <i class="uil-swatchbook"></i>
                        <span> Department </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.curriculum.index') }}" class="side-nav-link">
                        <i class="uil-layers"></i>
                        <span> Curriculum </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.semester.index') }}" class="side-nav-link">
                        <i class="uil-card-atm"></i>
                        <span> Semester </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.teacher.index') }}" class="side-nav-link">
                        <i class="uil-book-reader"></i>
                        <span> Teacher </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.batch.index') }}" class="side-nav-link">
                        <i class="uil-sim-card"></i>
                        <span> Batch </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link collapsed">
                        <i class="uil-arrows-resize-h"></i>
                        <span> Allocation </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables" style="">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{route('admin.requestedAllocation')}}">Request</a>
                            </li>
                            <li>
                                <a href="tables-datatable.html">Approved</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    @elseif ($user->role == 'teacher')
        <a href="{{route('teacher.dashboard')}}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm.png" alt="" height="50">
            </span>
        </a>
        <a href="{{route('teacher.dashboard')}}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{asset('/')}}assets/backend/images/logo-dark.png" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{asset('/')}}assets/backend/images/logo_sm_dark.png" alt="" height="50">
            </span>
        </a>
        <div class="h-100" id="leftside-menu-container" data-simplebar="">
            <ul class="side-nav">
                <li class="side-nav-title side-nav-item">Navigation</li>
                <li class="side-nav-item">
                    <a href="{{route("teacher.dashboard")}}" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Dashbaord </span>
                    </a>
                </li>

                <li class="side-nav-title side-nav-item">Apps</li>

                <li class="side-nav-item">
                    <a href="{{ route('teacher.allocation')}}" class="side-nav-link">
                        <i class="uil-arrows-resize-h"></i>
                        <span> Allocation </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('teacher.allAllocatedSubjects')}}" class="side-nav-link">
                        <i class="uil-keyboard-hide"></i>
                        <span> Allocated Subjects </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    @endif
</div>
