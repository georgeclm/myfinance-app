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
                    @if (!auth()->user()->rekenings->isEmpty())
                        <a href="#" data-toggle="modal" data-target="#addRekening"
                            class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                    @endif
                </div>
                <div class="row">
                    @include('layouts.partials.income')
                    @include('layouts.partials.spending')
                    @include('layouts.partials.balance')
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 border-bottom-info">
                            <div class="h3 fw-bold text-info card-body">
                                <b>Bulan {{ now()->format('F') }}</b>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->rekenings->isEmpty())
                        <div class="col-lg-6">
                            <div class="card mb-4 py-3 border-left-success">
                                <div class="card-body">
                                    Buat Rekening Dulu Sebelum Mencatat Keuangan
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @foreach ($jenisuangs as $jenisuang)

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="wrap-table100 " id="thetable">
                                    <div class="table">
                                        <div class="row header">
                                            <div class="cell ">
                                                Jumlah
                                            </div>
                                            @if (in_array($jenisuang->id, [4, 5]))
                                                <div class="cell">
                                                    Nama Utang
                                                </div>
                                            @endif
                                            @if (in_array($jenisuang->id, [1, 2]))

                                                <div class="cell">
                                                    Kategori
                                                </div>
                                            @endif
                                            <div class="cell">
                                                Akun
                                            </div>
                                            @if ($jenisuang->id == 3)

                                                <div class="cell">
                                                    Akun Tujuan
                                                </div>
                                            @endif
                                            <div class="cell">
                                                Keterangan
                                            </div>
                                            <div class="cell">
                                                Tanggal
                                            </div>
                                        </div>
                                        @forelse ($jenisuang->user_transactions->take(5) as $transaction)
                                            <div class="row">
                                                <div class="cell {{ $jenisuang->textColor() }}" data-title="Jumlah">
                                                    Rp. {{ number_format($transaction->jumlah) }}
                                                </div>
                                                @if ($transaction->utang_id)
                                                    <div class="cell" data-title="Nama Utang">
                                                        {{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                                    </div>
                                                @endif
                                                @if ($transaction->utangteman_id)
                                                    <div class="cell" data-title="Nama Utang">
                                                        {{ $transaction->utangteman->keterangan ?? $transaction->utangteman->nama }}
                                                    </div>
                                                @endif
                                                @if ($jenisuang->id == 1)
                                                    <div class="cell" data-title="Kategori">
                                                        {{ $transaction->kategori }}
                                                    </div>
                                                @endif
                                                @if ($jenisuang->id == 2)
                                                    <div class="cell" data-title="Kategori">
                                                        {{ $transaction->category->nama }}
                                                    </div>
                                                @endif
                                                <div class="cell" data-title="Akun">
                                                    {{ $transaction->rekening->nama_akun }}
                                                </div>
                                                @if ($jenisuang->id == 3)
                                                    <div class="cell" data-title="Akun Tujuan">
                                                        {{ $transaction->rekening_tujuan->nama_akun }}
                                                    </div>
                                                @endif
                                                <div class="cell" data-title="Keterangan">
                                                    {{ $transaction->keterangan }}
                                                </div>
                                                <div class="cell" data-title="Tanggal">
                                                    {{ $transaction->created_at->format('l j F Y') }}
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                                <table class="table table-bordered" width="100%" cellspacing="0" id="bigtable">
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
                                        @forelse ($jenisuang->user_transactions->take(5) as $transaction)
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
                                                @if ($jenisuang->id == 1)
                                                    <td>{{ $transaction->kategori }}</td>
                                                @endif
                                                @if ($jenisuang->id == 2)
                                                    <td>{{ $transaction->category->nama }}</td>
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
                                <div class="text-end mt-3"><a href="{{ route('jenisuangs.show', $jenisuang) }}">Show
                                        All</a></div>
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
