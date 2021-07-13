@extends('layouts.app')

@section('content')
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.sidebar')
            <!-- Begin Page Content -->
            <div class="bg-black">
                <br>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class=" d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-white">Dashboard</h1>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 mb-3 this_small">
                            <!-- Project Card Example -->
                            <div class="d-flex align-items-center justify-content-between">
                                <a class="card bg-dark border-0" href="{{ route('utangtemans.index') }}"
                                    style="max-width: 66px; line-height: 80% !important">
                                    <div class="card-body text-center p-2">
                                        <i class="fas fa-fw fa-bomb"></i><br>
                                        <small style="font-size: 10px">Utang Teman</small>
                                    </div>
                                </a>
                                <a class="card bg-dark border-0" href="{{ route('utangs.index') }}"
                                    style="max-width: 66px; line-height: 80% !important">
                                    <div class="card-body text-center p-2">
                                        <i class="fas fa-fw fa-biohazard"></i><br>
                                        <span style="font-size: 10px; " class="d-sm-inline">Utang
                                            Anda</span>
                                    </div>
                                </a>
                                <a class="card bg-dark border-0" href="{{ route('cicilans.index') }}"
                                    style="max-width: 66px; line-height: 80% !important; word-wrap:normal;">
                                    <div class="card-body text-center p-2">
                                        <i class="fas fa-fw fa-redo-alt"></i>
                                        <span style="font-size: 10px" class="d-sm-inline">Berulang / Cicilan</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @include('layouts.partials.income')
                        @include('layouts.partials.spending')
                        @include('layouts.partials.balance')
                        @include('layouts.partials.balancewithasset')
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
                                <div class="bg-dark card shadow mb-4 border-0">
                                    <div class="bg-gray-100 card-header py-3 border-0">
                                        <h6 class="m-0 font-weight-bold text-danger">{{ now()->format('F') }} Spending
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($categories as $category)
                                            @if ($category->persen() != 0)
                                                <h4 class="small font-weight-bold text-white">{{ $category->nama }}<span
                                                        class="float-right">{{ $category->persen() }}%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div role="progressbar" style="width: {{ $category->persen() }}%"
                                                        aria-valuenow="{{ $category->persen() }}" aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        class="progress-bar {{ $category->bgColor() }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            @include('layouts.partials.no_data', ['message' => 'Mulai Catat Keuangan'])
                        @endif
                        @if (auth()->user()->uangmasuk() != 0)
                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">
                                <!-- Project Card Example -->
                                <div class="bg-dark card shadow mb-4 border-0">
                                    <div class="bg-gray-100 card-header py-3 border-0">
                                        <h6 class="m-0 font-weight-bold text-success">{{ now()->format('F') }} Income
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($category_masuks as $category)
                                            @if ($category->persen() != 0)
                                                <h4 class="small font-weight-bold text-white">{{ $category->nama }}<span
                                                        class="float-right">{{ $category->persen() }}%</span>
                                                </h4>
                                                <div class="progress mb-4">
                                                    <div role="progressbar" style="width: {{ $category->persen() }}%"
                                                        aria-valuenow="{{ $category->persen() }}" aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        class="progress-bar {{ $category->bgColor() }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- /.container-fluid -->
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
