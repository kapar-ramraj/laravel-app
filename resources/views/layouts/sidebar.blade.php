<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/'.auth()->user()->profile)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->fname.' '.auth()->user()->lname}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                {{-- @if(auth()->user()->user_type != 'Student') --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link {{ Route::is('user.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('employee.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employee.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Employee</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}" class="nav-link {{ Route::is('categories.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('publishers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Publishers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('publishers.index')}}" class="nav-link {{ Route::is('publishers.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>publishers List</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('publishers.create')}}" class="nav-link {{ Route::is('publishers.create') ? 'active' : '' }}"  >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Publisher</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('authors*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i> &nbsp;
                        <p>
                            Authors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('authors.index')}}" class="nav-link {{ Route::is('authors.index') ? 'active' : '' }}">
                                <i class="fas fa-user"></i> 
                                <p>Authors List</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('authors.create')}}" class="nav-link {{ Route::is('authors.create') ? 'active' : '' }}"  >
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Authors</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- @endif --}}
                <li class="nav-item active">
                    <a href="{{route('student.profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        Profile
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-th"></i>
                        Logout
                    </a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
