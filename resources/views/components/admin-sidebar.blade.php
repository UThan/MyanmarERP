<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/img/admin/AdminLTELogo.png" alt="MyanmarERP Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Myanmar ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        {{-- <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/admin/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">
                    Dashboard
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Search books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-book-reader nav-icon"></i>
                        <p>Search member</p>
                    </a>
                </li>

                <li class="nav-header">
                    Books
                </li>
                <li class="nav-item">
                    <a href="{{ route('book.index') }}" class="nav-link">
                        <i class="fas fa-swatchbook nav-icon"></i>
                        <p>All books</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('book.create') }}" class="nav-link">
                        <i class="fas fa-plus-square nav-icon"></i>
                        <p>Add new book</p>
                    </a>
                </li>

                <li class="nav-header">
                    Admin
                </li>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-plus"></i>
                                <p>add category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('author.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>add author</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('memberstatus.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>member status</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reservationstatus.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>reservation status</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">
                    Manage
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservation.index') }}" class="nav-link">
                        <i class="fas fa-address-book nav-icon"></i>
                        <p>All reservations</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('due.index') }}" class="nav-link">
                        <i class="fas fa-times-circle nav-icon"></i>
                        <p>Due list</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-credit-card nav-icon"></i>
                        <p>Fine Payment</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
