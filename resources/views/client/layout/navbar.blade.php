<nav class="navbar navbar-header navbar-expand-lg">
	<div class="container-fluid">
        
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
           
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <h4 class="text-white mt-3">{{ Auth::user()->name }}</h4>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                      </form>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>