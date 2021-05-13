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
                    <h1 class="h3 mb-2 text-gray-800">Utang Anda</h1>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Utang Anda</a>
                </div>
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Total Utang</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                            {{ number_format(
    auth()->user()->totalutang(),
) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Utang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Utang ke Siapa</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($utangs as $utang)
                                        @include('utang.edit')
                                        <tr>
                                            <td>{{ $utang->nama }}</td>
                                            <td>Rp. {{ number_format($utang->jumlah) }}</td>
                                            <td>{{ $utang->keterangan }}</td>
                                            <td>{{ $utang->created_at->format('Y-m-d') }}</td>
                                            <td> <button data-toggle="modal" data-target="#editmodal-{{ $utang->id }}"
                                                    type="button" class="btn btn-info btn-circle">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        @include('layouts.footer')
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    @include('utang.create')
@endsection
@section('script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
