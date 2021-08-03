@extends('layouts.app')

@section('content')
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.sidebar')
            <div class="bg-black">

                <br>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-white">Settings</h1>
                    </div>
                    <div class="row">

                        <div class="col-lg-6">
                            <!-- Dropdown Card Example -->
                            <div class="bg-dark border-0 card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="bg-gray-100 border-0 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Categories Spending</h6>
                                    <a href="#" data-toggle="modal" data-target="#addCategory">
                                        <i class="fas fa-plus fa-sm fa-fw text-danger"></i>
                                    </a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($categories as $category)
                                            <li class="bg-black list-group-item d-flex align-items-center">
                                                <div class="w-100 text-danger">
                                                    <i
                                                        class="fas {{ $category->icon() }} text-danger mx-2"></i>{{ $category->nama }}
                                                </div>
                                                {{-- @if ($category->user_id != null)
                                                    <a href="{{ route('categories.remove', $category) }}">
                                                        <span class="badge badge-danger badge-pill text-end">x</span></a>
                                                @endif --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="bg-dark border-0 card shadow mb-4">
                                <div
                                    class="bg-gray-100 border-0 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Categories Income</h6>
                                    <a href="#" data-toggle="modal" data-target="#addCategoryMasuk">
                                        <i class="fas fa-plus fa-sm fa-fw text-success"></i>
                                    </a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($category_masuks as $category)
                                            <li class="bg-black list-group-item d-flex align-items-center">
                                                <div class="w-100 text-success">
                                                    <i
                                                        class="fas {{ $category->icon() }} text-success mx-2"></i>{{ $category->nama }}
                                                </div>
                                                {{-- @if ($category->user_id != null)
                                                    <a href="{{ route('category_masuks.remove', $category) }}">
                                                        <span class="badge badge-success badge-pill">x</span></a>
                                                @endif --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    @include('settings.createCategory')
    @include('settings.createCategoryMasuk')
    <!-- End of Page Wrapper -->
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
