<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold">Cctv Monitoring</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/users/'.(Auth::guard('web')->user()->avatar ?? 'user.png')) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('web')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->can('dashbord-overview') || auth()->user()->can('dashbord-maps'))
                <li class="nav-item {{ (request()->segment(1) == 'overview' || request()->segment(1) == 'maps') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (request()->segment(1) == 'overview' || request()->segment(1) == 'maps') ? 'active' : ''}}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>

                      <p>
                        Dashboard <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if(auth()->user()->can('dashbord-overview'))
                        <li class="nav-item">
                            <a href="{{ route('dashboard.overview') }}" class="nav-link {{ (request()->segment(1) == 'overview' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Overview</p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->can('dashbord-maps'))
                        <li class="nav-item">
                            <a href="{{ route('dashboard.maps') }}" class="nav-link {{ (request()->segment(1) == 'maps' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Maps</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(auth()->user()->can('asset-list'))
                <li class="nav-item">
                    <a href="{{ route('assets.index') }}" class="nav-link {{ (request()->segment(1) == 'assets' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-archive"></i>

                        <p>Assets</p>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('cctv-list'))
                <li class="nav-item">
                    <a href="{{ route('cctv.index') }}" class="nav-link {{ (request()->segment(1) == 'cctv' ) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-video"></i>

                        <p>Cctv</p>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('maintenance-list') || auth()->user()->can('work-order-list'))
                <li class="nav-item {{ (request()->segment(1) == 'work-orders' || request()->segment(1) == 'schedule-maintenances') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (request()->segment(1) == 'work-orders' || request()->segment(1) == 'schedule-maintenances') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tools"></i>

                        <p>
                            Maintenances <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(auth()->user()->can('maintenance-list'))
                        <li class="nav-item">
                            <a href="{{ route('schedule-maintenances.index') }}" class="nav-link {{ (request()->segment(1) == 'schedule-maintenances' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Schedule</p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->can('work-order-list'))
                        <li class="nav-item">
                            <a href="{{ route('work-orders.index') }}" class="nav-link {{ (request()->segment(1) == 'work-orders' ) ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                
                                <p>Work Order</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(auth()->user()->can('location-list') || auth()->user()->can('location-category-list'))
                <li class="nav-item {{ (request()->segment(1) == 'locations' || request()->segment(1) == 'location-categories') ? 'menu-open' : ''}}">
                  <a href="#" class="nav-link {{ (request()->segment(1) == 'locations' || request()->segment(1) == 'location-categories') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                    <p>
                      Location
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    @if(auth()->user()->can('location-list'))
                    <li class="nav-item">
                      <a href="{{ route('locations.index') }}" class="nav-link {{ (request()->segment(1) == 'locations' ) ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All location</p>
                      </a>
                    </li>
                    @endif

                    @if(auth()->user()->can('location-category-list'))
                    <li class="nav-item">
                      <a href="{{ route('location-categories.index') }}" class="nav-link {{ (request()->segment(1) == 'location-categories') ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Location Category</p>
                      </a>
                    </li>
                    @endif
                  </ul>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li class="nav-item">
                  <a href="{{ route('master-data.index') }}" class="nav-link {{ (request()->segment(1) == 'master-data' || request()->segment(1) == 'departements' || request()->segment(1) == 'users' || request()->segment(1) == 'user-technicals' || request()->segment(1) == 'user-technical-groups' || request()->segment(1) == 'categories' || request()->segment(1) == 'types' || request()->segment(1) == 'materials' || request()->segment(1) == 'boms' || request()->segment(1) == 'tasks' || request()->segment(1) == 'task-groups') ? 'active' : ''}}">
                      <i class="nav-icon fas fa-folder"></i>
                      <p>Master Data</p>
                  </a>
                </li>
                @endif

                @if (auth()->user()->can('report-maintenance'))
                <li class="nav-item">
                    <a href="{{ route('reports') }}" class="nav-link {{ (request()->segment(1) == 'reports') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Report Maintenance</p>
                    </a>
                  </li>
                @endif

                <li class="nav-item">
                    <a href="#" onclick="logout()" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>