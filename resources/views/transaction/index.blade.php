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
                        <h1 class="h3 mb-2 text-white">Catatan Keuangan</h1>
                        @if (!auth()->user()->rekenings->isEmpty())
                            <a href="#" data-toggle="modal" data-target="#addRekening"
                                class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                        @endif
                    </div>
                    <div class="row">
                        @include('layouts.partials.income')
                        @include('layouts.partials.spending')
                        @include('layouts.partials.balance')
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="bg-gray-100 border-0 card shadow h-100 py-2 border-bottom-info">
                                <div class="h3 fw-bold text-info card-body">
                                    <form action="" method="get">
                                        <select class="form-control form-control-user" name="q"
                                            onchange="this.form.submit()">
                                            <option value="0" selected disabled hidden>This Month</option>
                                            <option value="1" @if (request()->q == 1) selected @endif>Previous Month</option>
                                            <option value="2" @if (request()->q == 2) selected @endif>All</option>
                                        </select>
                                    </form>
                                    {{-- <b>Bulan {{ now()->format('F') }}</b> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="bg-gray-100 border-0 card shadow h-100 py-2 border-bottom-warning">
                                <div class="h3 fw-bold text-info card-body text-center">
                                    <form autocomplete="off" action="" method="get" id="date_submit">
                                        <input class="form-control" type="text" name="daterange"
                                            value="{{ request()->daterange ?? 'This Month' }}" />
                                        <input type="submit"
                                            class="mt-2 d-sm-inline-block btn btn-dark btn-secondary shadow-sm"
                                            value="Custom" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        @include('layouts.partials.newaccount')
                    </div>
                    @foreach ($jenisuangs as $jenisuang)
                        <!-- DataTales Example -->
                        <div class="bg-dark border-0 card shadow mb-4">
                            <div class="bg-gray-100 border-0 card-header py-3">
                                <h6 class="font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
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
                                                        <div class="cell text-white" data-title="Nama Utang">
                                                            {{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                                        </div>
                                                    @endif
                                                    @if ($transaction->utangteman_id)
                                                        <div class="cell text-white" data-title="Nama Utang">
                                                            {{ $transaction->utangteman->keterangan ?? $transaction->utangteman->nama }}
                                                        </div>
                                                    @endif
                                                    @if ($jenisuang->id == 1)
                                                        <div class="cell text-white" data-title="Kategori">
                                                            {{ $transaction->category_masuk->nama }}
                                                        </div>
                                                    @endif
                                                    @if ($jenisuang->id == 2)
                                                        <div class="cell text-white" data-title="Kategori">
                                                            {{ $transaction->category->nama }}
                                                        </div>
                                                    @endif
                                                    <div class="cell text-white" data-title="Akun">
                                                        {{ $transaction->rekening->nama_akun }}
                                                    </div>
                                                    @if ($jenisuang->id == 3)
                                                        <div class="cell text-white" data-title="Akun Tujuan">
                                                            {{ $transaction->rekening_tujuan->nama_akun }}
                                                        </div>
                                                    @endif
                                                    <div class="cell text-white" data-title="Keterangan">
                                                        {{ $transaction->keterangan }}
                                                    </div>
                                                    <div class="cell text-white" data-title="Tanggal">
                                                        {{ $transaction->created_at->format('l j F Y') }}
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>

                                    <table class="table table-bordered table-dark" width="100%" cellspacing="0"
                                        id="bigtable">
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
                                                        <td>{{ $transaction->category_masuk->nama }}</td>
                                                    @endif
                                                    @if ($jenisuang->id == 2)
                                                        <td>{{ $transaction->category->nama }}</td>
                                                    @endif
                                                    <td>{{ $transaction->rekening->nama_akun }}</td>
                                                    @if ($transaction->rekening_tujuan)
                                                        <td>{{ $transaction->rekening_tujuan->nama_akun }}</td>
                                                    @endif
                                                    <td>{{ $transaction->keterangan ?? '-' }}</td>
                                                    <td>{{ $transaction->created_at->format('l j F Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Transaksi Kosong</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    @if ($jenisuang->user_transactions->count() > 5)
                                        @if (request()->has('q'))
                                            <div class="text-end mt-3"><a
                                                    href="{{ route('jenisuangs.show', ['q' => request()->q, $jenisuang]) }}">Show
                                                    All</a></div>
                                        @else
                                            <div class="text-end mt-3"><a
                                                    href="{{ route('jenisuangs.show', $jenisuang) }}">Show
                                                    All</a></div>

                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.container-fluid -->
                @include('layouts.footer')
            </div>
        </div>
        <!-- End of Main Content -->
    </div>

    @include('transaction.create')
@endsection
