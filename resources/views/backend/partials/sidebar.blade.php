<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        @php
        $logo = App\Models\Setting::find(1)->first();
        @endphp
        <img <img src="{{ asset('images/backend') }}/{{ $logo->site_logo }}" alt="Com logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $logo->site_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/backend') }}/{{ Auth::user()->avatar }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @can('admin.settings.index')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs nav-icon"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cog nav-icon"></i>
                                <p>
                                    General Settings

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.modules.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Modules

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Permission

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    User

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.backups.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Back Up

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hospital-user"></i>

                        <p>
                            Slider

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menus.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hospital-user"></i>

                        <p>
                            Menu

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menudescriptions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hospital-user"></i>

                        <p>
                            Menu Descriptions

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hospital-user"></i>

                        <p>
                            Category

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hospital-user"></i>

                        <p>
                            Product

                        </p>
                    </a>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Quote
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.quotes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Un-read</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mark.read') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Read</p>
                            </a>
                        </li>


                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
