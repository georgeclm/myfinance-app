@extends('layouts.app')

@section('content')
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.sidebar')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">Settings</h1>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <!-- Dropdown Card Example -->
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-danger">Categories Uang Keluar</h6>
                                <a href="#" data-toggle="modal" data-target="#addCategory">
                                    <i class="fas fa-plus fa-sm fa-fw text-danger"></i>
                                </a>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach (App\Models\Category::all() as $category)
                                        <li class="list-group-item d-flex align-items-center">
                                            <div class="w-100 text-danger">
                                                <i
                                                    class="fas {{ $category->icon() }} text-danger mx-2"></i>{{ $category->nama }}
                                            </div>
                                            @if ($category->created_at)
                                                <a href="{{ route('categories.remove', $category) }}">
                                                    <span class="badge badge-danger badge-pill text-end">x</span></a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Categories Uang Masuk</h6>
                                <a href="#" data-toggle="modal" data-target="#addCategoryMasuk">
                                    <i class="fas fa-plus fa-sm fa-fw text-success"></i>
                                </a>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach (App\Models\CategoryMasuk::all() as $category)
                                        <li class="list-group-item d-flex align-items-center">
                                            <div class="w-100 text-success">
                                                <i
                                                    class="fas {{ $category->icon() }} text-success mx-2"></i>{{ $category->nama }}
                                            </div>
                                            @if ($category->created_at)
                                                <a href="{{ route('category_masuks.remove', $category) }}">
                                                    <span class="badge badge-success badge-pill">x</span></a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        @include('layouts.footer')
    </div>
    @include('settings.createCategory')
    @include('settings.createCategoryMasuk')
    <!-- End of Page Wrapper -->
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
