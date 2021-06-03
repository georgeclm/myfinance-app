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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                </div>
                <!-- Content Row -->
                <div class="row">
                    @include('layouts.partials.income')
                    @include('layouts.partials.spending')
                    @include('layouts.partials.balance')
                    @include('layouts.partials.totalbalance')
                </div>
                <!-- Content Row -->
                <!-- Area Chart -->
                {{-- <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Income Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                {{-- <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Direct
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Social
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Referral
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row --> --}}
                <div class="row">
                    @if (auth()->user()->uangkeluar() != 0)
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Pengeluaran
                                        Bulan {{ now()->format('F') }}</h6>
                                </div>
                                <div class="card-body">
                                    @foreach ($categories as $category)
                                        @if ($category->persen() != 0)
                                            <h4 class="small font-weight-bold">{{ $category->nama }}<span
                                                    class="float-right">{{ $category->persen() }}%</span>
                                            </h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar {{ $category->bgColor() }}" role="progressbar"
                                                    style="width: {{ $category->persen() }}%"
                                                    aria-valuenow="{{ $category->persen() }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div class="card mb-4 py-3 border-left-success">
                                <div class="card-body">
                                    Mulai Buat Rekening Lalu Coba Transaksi
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (auth()->user()->uangmasuk() != 0)
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Pemasukan
                                        Bulan {{ now()->format('F') }}</h6>
                                </div>
                                <div class="card-body">
                                    @foreach (App\Models\CategoryMasuk::all() as $category)
                                        @if ($category->persen() != 0)
                                            <h4 class="small font-weight-bold">{{ $category->nama }}<span
                                                    class="float-right">{{ $category->persen() }}%</span>
                                            </h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar {{ $category->bgColor() }}" role="progressbar"
                                                    style="width: {{ $category->persen() }}%"
                                                    aria-valuenow="{{ $category->persen() }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                        </div>

                    @endif
                </div>

                <!-- /.container-fluid -->
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
