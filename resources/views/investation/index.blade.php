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
                        <h1 class="h3 mb-2 text-white">Investasi</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Dropdown Card Example -->
                            <div class="bg-dark border-0 card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="bg-gray-100 border-0 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Investasi</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($investations as $investation)
                                            <a href="{{ route('stocks.index') }}"
                                                class="list-group-item list-group-item-action bg-black  d-flex align-items-center">
                                                <div class="flex-grow-1 text-white">
                                                    {{ $investation->nama }}
                                                </div>
                                                <div class="text-white">
                                                    Rp. {{ number_format($investation->total) }}
                                                </div>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                @include('layouts.footer')
            </div>
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
