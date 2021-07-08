            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">My Finance</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item @if (Route::current()->uri == 'home') active @endif ">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Keuangan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item @if (Route::current()->uri == 'rekenings') active @endif">
                    <a class="nav-link" href="{{ route('rekenings.index') }}">

                        <i class="fas fa-fw fa-wallet"></i>
                        <span>Rekeningku</span>
                    </a>
                </li>
                <li class="nav-item @if (in_array(Route::current()->uri, ['transactions',
                    'jenisuangs/{jenisuang}'])) active @endif">
                    {{-- <a class="nav-link" href="{{ route('transactions.index') }}"> --}}
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                        <span>Catatan Keuangan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse @if (in_array(Route::current()->
                        uri, ['transactions', 'jenisuangs/{jenisuang}'])) show @endif"
                        aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-dark border-0  py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Jenis Uang:</h6>
                            <a class="collapse-item text-white @if (Route::current()->uri ==
                                'transactions') active @endif"
                                href="{{ route('transactions.index') }}">All</a>
                            <a class="collapse-item text-white @if (strrchr(url()->current(), 'o')
                                == 'om/jenisuangs/1') active @endif"
                                href="{{ route('jenisuangs.show', 1) }}">Uang
                                Masuk</a>
                            <a class="collapse-item text-white @if (strrchr(url()->current(), 'o')
                                == 'om/jenisuangs/2') active @endif"
                                href="{{ route('jenisuangs.show', 2) }}">Uang
                                Keluar</a>
                            <a class="collapse-item text-white @if (strrchr(url()->current(), 'o')
                                == 'om/jenisuangs/3') active @endif"
                                href="{{ route('jenisuangs.show', 3) }}">Transfer</a>
                            <a class="collapse-item text-white @if (strrchr(url()->current(), 'o')
                                == 'om/jenisuangs/4') active @endif"
                                href="{{ route('jenisuangs.show', 4) }}">Bayar
                                Utang</a>
                            <a class="collapse-item text-white @if (strrchr(url()->current(), 'o')
                                == 'om/jenisuangs/5') active @endif"
                                href="{{ route('jenisuangs.show', 5) }}">Teman
                                Bayar Utang</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item @if (Route::current()->uri == 'utangs') active @endif">
                    <a class="nav-link" href="{{ route('utangs.index') }}">
                        <i class="fas fa-fw fa-biohazard"></i>
                        <span>Utang Anda</span>
                    </a>
                </li>
                <li class="nav-item @if (Route::current()->uri == 'utangtemans') active @endif">
                    <a class="nav-link" href="{{ route('utangtemans.index') }}">
                        <i class="fas fa-fw fa-bomb"></i>
                        <span>Utang Teman Anda</span>
                    </a>
                </li>
                <li class="nav-item @if (Route::current()->uri == 'cicilans') active @endif">
                    <a class="nav-link" href="{{ route('cicilans.index') }}">
                        <i class="fas fa-fw fa-redo-alt"></i>
                        <span>Cicilan / Berulang</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Masa Depan
                </div>
                <li class="nav-item @if (Route::current()->uri == 'financialplans') active @endif">
                    <a class="nav-link" href="{{ route('financialplans.index') }}">
                        <i class="fas fa-fw fa-clipboard-list"></i>
                        <span>Rencana Keuangan</span>
                    </a>
                </li>
                <li class="nav-item @if (Route::current()->uri == 'investations') active @endif">
                    <a class="nav-link" href="{{ route('investations.index') }}">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Investasi</span>
                    </a>
                </li>
                @if (auth()->id() == 2)
                    <li class="nav-item @if (Route::current()->uri == 'settings') active @endif">
                        <a class="nav-link" href="{{ route('settings.index') }}">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                @endif
                {{-- <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Utilities</span>
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
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block"> --}}

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
                {{-- <div class="sidebar-card d-none d-lg-flex">
                    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                        and more!</p>
                    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                        Pro!</a>
                </div> --}}

            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-dark topbar static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        {{-- <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            {{-- <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li> --}}
                            <livewire:alert-center />
                            <!-- Nav Item - Alerts -->
                            {{-- <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with
                                                a
                                                problem I've been having.</div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month,
                                                how
                                                would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last month's report looks great, I am very happy
                                                with
                                                the progress so far, keep up the good work!</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle"
                                                src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because
                                                someone
                                                told me that people say this to all dogs, even if they aren't good...
                                            </div>
                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                        Messages</a>
                                </div>
                            </li> --}}

                            {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white small">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('img/default-user-icon.jpg') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class=" bg-dark border-0 dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    {{-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a> --}}
                                    <a class="dropdown-item text-white" href="http://web.epafroditusgeorge.com"
                                        target="_blank">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        My Website
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="#" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="bg-dark modal-content">
                                <div class="border-0 modal-header">
                                    <h5 class="modal-title text-white">Ready to Leave?</h5>
                                    <button class="close text-white" type="button" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-white">Select "Logout" below if you are ready to end your
                                    current
                                    session.</div>
                                <div class="modal-footer border-0">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-gray-100 sidebar-divider my-0">
