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
                    <h1 class="h3 mb-2 text-gray-800">Catatan Keuangan</h1>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                </div>
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Earnings (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                            {{ number_format(
    auth()->user()->uangmasuk(),
) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Outcome (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                            {{ number_format(
    auth()->user()->uangkeluar(),
) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Balance (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                            {{ number_format(
    auth()->user()->saldoperbulan(),
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
                @foreach ($jenisuangs as $jenisuang)
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="@switch($jenisuang->id)           @case(1)
                                                bg-success @break @case(2) bg-danger
                                                @break
                                                @case(3)bg-primary @break
                                                @default
                                            bg-warning @endswitch text-light">
                                            <th>Jumlah</th>
                                            @if ($jenisuang->id == 4)
                                                <th>Nama Utang</th>
                                            @endif
                                            @if (in_array($jenisuang->id, [1, 2]))
                                                <th>Kategori</th>
                                            @endif
                                            <th>Akun</th>
                                            @if ($jenisuang->id == 3)
                                                <th>Akun Tujuan</th>
                                            @endif
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jenisuang->transactions as $transaction)
                                            <tr>
                                                <td>Rp. {{ number_format($transaction->jumlah) }}</td>
                                                @if ($transaction->utang_id)
                                                    <td>{{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                                    </td>
                                                @endif
                                                @if (in_array($jenisuang->id, [1, 2]))
                                                    <td>{{ $transaction->kategori }}</td>
                                                @endif
                                                <td>{{ $transaction->rekening->nama_akun }}</td>
                                                @if ($transaction->rekening_tujuan)
                                                    <td>{{ $transaction->rekening_tujuan->nama_akun }}</td>
                                                @endif
                                                <td>{{ $transaction->keterangan }}</td>
                                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Transaksi Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        @include('layouts.footer')
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    @include('transaction.create')
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
