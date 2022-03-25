<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/img/admin/AdminLTELogo.png" alt="MyanmarERP Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Myanmar ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class=" nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-header">
                    Books
                </li>
                <li class="nav-item">
                    <a href="{{ route('book') }}" class="nav-link">
                        <i class="fas fa-book nav-icon"></i>
                        <p>All books</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('addbook') }}" class="nav-link">
                        <i class="fas fa-plus-square nav-icon"></i>
                        <p>New Entry</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('booklocation') }}" class="nav-link">
                        <i class="fas fa-globe-americas nav-icon"></i>
                        <p>Book Location</p>
                    </a>
                </li>


                <li class="nav-header">
                    Institutes
                </li>
                <li class="nav-item">
                    <a href="{{ route('institution') }}" class="nav-link">
                        <i class="fas fa-university nav-icon"></i>
                        <p>All institutes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('addinstitution') }}" class="nav-link">
                        <i class="fas fa-plus-square nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
               


                <li class="nav-header">
                    Members
                </li>
                <li class="nav-item">
                    <a href="{{ route('member') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>All Members</p>
                    </a>                  
                </li>

                <li class="nav-item">
                    <a href="{{ route('addmember') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Register</p>
                    </a>
                </li>

                <li class="nav-header">
                    Manage
                </li>
                <li class="nav-item">
                    <a href="{{ route('borrowbook') }}" class="nav-link">
                        <i class="fas fa-swatchbook nav-icon"></i>
                        <p>Borrow books</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('borrowlist') }}" class="nav-link">
                        <i class="fas fa-address-book nav-icon"></i>
                        <p>Borrowed lists</p>
                    </a>
                </li>



                <li class="nav-header">
                    Admin
                </li>
                <li class="nav-item">
                    <a href="{{ route('booksetting') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Book Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('locationsetting') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Location Settings</p>
                    </a>
                </li>
                

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
