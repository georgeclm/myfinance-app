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
                    <span class="h3 fw-bold text-info"><b>Bulan {{ $month }}</b></span>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                </div>
                <div class="row">
                    @include('layouts.partials.income')
                    @include('layouts.partials.spending')
                    @include('layouts.partials.balance')
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
                                        <tr class="{{ $jenisuang->color() }} text-light">
                                            <th>Jumlah</th>
                                            @if (in_array($jenisuang->id, [4, 5]))
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
                                                @if ($transaction->utangteman_id)
                                                    <td>{{ $transaction->utangteman->keterangan ?? $transaction->utangteman->nama }}
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
                                                <td>{{ $transaction->created_at->format('l j F Y') }}</td>
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
