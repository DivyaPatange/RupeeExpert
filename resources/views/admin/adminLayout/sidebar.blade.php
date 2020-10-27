<!-- Sidebar -->
<div class="sidebar">
	<div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
            <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('favicon.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::guard('admin')->user()->name }}
                            <!-- <span class="user-level">Administrator</span> -->
                            <!-- <span class="caret"></span> -->
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{ url('/admin') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Users</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.companytree') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Company Tree</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dailyReport') }}">
                        <i class="fas fa-table"></i>
                        <p>Daily Report</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/wallet') }}">
                        <i class="far fa-chart-bar"></i>
                        <p>Admin Wallet</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                    <!-- <div class="collapse" id="maps">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="maps/googlemaps.html">
                                    <span class="sub-item">Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreenmaps.html">
                                    <span class="sub-item">Full Screen Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/jqvmap.html">
                                    <span class="sub-item">JQVMap</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </li>
                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Charts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="charts/charts.html">
                                    <span class="sub-item">Chart Js</span>
                                </a>
                            </li>
                            <li>
                                <a href="charts/sparkline.html">
                                    <span class="sub-item">Sparkline</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                
                <li class="nav-item">
                    <a href="{{ url('/admin/userWallet') }}">
                        <i class="fas fa-desktop"></i>
                        <p>User Wallet</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#custompages">
                        <i class="fas fa-paint-roller"></i>
                        <p>Custom Pages</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="custompages">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="login.html">
                                    <span class="sub-item">Login & Register 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="login2.html">
                                    <span class="sub-item">Login & Register 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="userprofile.html">
                                    <span class="sub-item">User Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="404.html">
                                    <span class="sub-item">404</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->