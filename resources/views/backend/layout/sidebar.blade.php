<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid" >
        </div>
        <div class="sidebar-brand-text mx-3 text-dark" id="tiile">Yangon Hluttaw</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt text-dark fa-2x"></i>
            <span class="text-dark">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-muted">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('calendar.setting') }}">
            <i class="fa-solid fa-calendar text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Calendar</span></a>
    </li>
   

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-newspaper text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">News</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="z-index:100">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">News Components:</h6>
                <a class="collapse-item" href="{{ route('news.breaking') }}">Breaking News</a>
                <a class="collapse-item" href="{{ route('news.hot') }}">Hot News</a>
                <a class="collapse-item" href="{{ route('news.latest') }}">Latest News</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fa-solid fa-photo-film text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Photo / Videos</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('parliament.times.index') }}">
            <i class="fa-solid fa-list text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Parliament Times</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('psession.get') }}">
            <i class="fa-solid fa-handshake text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Session</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laws.get') }}">
            <i class="fa-solid fa-scale-balanced text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Laws</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('qandp.get') }}">
            <i class="fa-solid fa-question text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Questions / Proposal</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('psession.get') }}">
            <i class="fa-regular fa-file text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Reports</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('psession.get') }}">
            <i class="fa-solid fa-layer-group text-dark" style="font-size: 23px"></i>
            <span class="text-dark ml-2">Committees / Bodies</span></a>
    </li>
    
   
    

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('calendar.setting') }}" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench text-dark" style="font-size: 23px"></i>
            <span class="text-dark">Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-muted">
         Setting
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('all_access')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder text-dark" style="font-size: 23px"></i>
            <span class="text-dark">Roles and Permissions</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Roles and Permission</h6>
                <a class="collapse-item" href="{{ route('role.index') }}">Roles</a>
                <a class="collapse-item" href="{{ route('users.get') }}">Users</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    @endcan
    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area text-dark"></i>
            <span class="text-dark">Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table text-dark"></i>
            <span class="text-dark">Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    

</ul>

