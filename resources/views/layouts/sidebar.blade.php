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

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-dark bg-dark topbar static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button> --}}
                        <a class="ml-3 this_small text-white" href="{{ route('home') }}">
                            <i class="fa fa-balance-scale fa-2x"></i>
                        </a>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Alerts -->
                            <livewire:alert-center />

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
                    <nav class="navbar navbar-dark bg-black navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
                        <ul class="navbar-nav nav-justified w-100">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link text-small @if (Route::current()->uri == 'home') active @endif"><i
                                        class="fas fa-fw fa-tachometer-alt"></i> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rekenings.index') }}" class="nav-link @if (Route::current()->uri == 'rekenings') active @endif"><i
                                        class="fas fa-fw fa-wallet"></i></a>
                            </li>
                            <li class="nav-item dropup">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-fw fa-dollar-sign"></i>
                                </a>
                                <div class="dropdown-menu bg-dark border-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white @if (Route::current()->uri
                                        == 'transactions') active @endif"
                                        href="{{ route('transactions.index') }}">All</a>
                                    <a class="dropdown-item text-white @if (strrchr(url()->current(), 'o') == 'om/jenisuangs/1') active @endif"
                                        href="{{ route('jenisuangs.show', 1) }}">Uang
                                        Masuk</a>
                                    <a class="dropdown-item text-white @if (strrchr(url()->current(), 'o') == 'om/jenisuangs/2') active @endif"
                                        href="{{ route('jenisuangs.show', 2) }}">Uang
                                        Keluar</a>
                                    <a class="dropdown-item text-white @if (strrchr(url()->current(), 'o') == 'om/jenisuangs/3') active @endif"
                                        href="{{ route('jenisuangs.show', 3) }}">Transfer</a>
                                    <a class="dropdown-item text-white @if (strrchr(url()->current(), 'o') == 'om/jenisuangs/4') active @endif"
                                        href="{{ route('jenisuangs.show', 4) }}">Bayar
                                        Utang</a>
                                    <a class="dropdown-item text-white @if (strrchr(url()->current(), 'o') == 'om/jenisuangs/5') active @endif"
                                        href="{{ route('jenisuangs.show', 5) }}">Teman
                                        Bayar Utang</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('financialplans.index') }}" class="nav-link @if (Route::current()->uri == 'financialplans') active @endif"><i class="fas fa-fw fa-clipboard-list"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('investations.index') }}" class="nav-link @if (Route::current()->uri == 'investations') active @endif
                                    @if (Route::current()->uri == 'investations')
                                        active @endif"><i class="fas fa-fw fa-chart-line"></i>
                                </a>
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
