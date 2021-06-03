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
                    <h1 class="h3 mb-2 text-gray-800">{{ $jenisuang->nama }}</h1>
                    {{-- @if (!auth()->user()->rekenings->isEmpty())
                        <a href="#" data-toggle="modal" data-target="#addRekening"
                            class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                    @endif --}}
                </div>
                <div class="row">
                    @include('layouts.partials.income')
                    @include('layouts.partials.spending')
                    @include('layouts.partials.balance')
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 border-bottom-info">
                            <div class="h3 fw-bold text-info card-body">
                                <form action="" method="get">
                                    @if (request()->has('search'))
                                        <input type="hidden" name="search" value="{{ request()->search }}">
                                    @endif
                                    @if (request()->has('search2'))
                                        <input type="hidden" name="search2" value="{{ request()->search2 }}">
                                    @endif
                                    <select class="form-control form-control-user" name="q" onchange="this.form.submit()">
                                        <option value="" selected disabled hidden>This Month</option>
                                        <option value="1" @if (request()->q == 1) selected @endif>Previous Month</option>
                                        <option value="2" @if (request()->q == 2) selected @endif>All</option>

                                    </select>
                                </form>
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
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row align-items-baseline">
                            <div class="col-md-5">
                                <h6 class="font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
                            </div>
                            @if ($jenisuang->id == 2)
                                <div class="col-md-5">
                                    <h6 class="font-weight-bold text-danger">Rp.
                                        {{ number_format(!request()->has('search') ? $jenisuang->categoriesTotal() : $jenisuang->categoryTotal(request()->search)) }}
                                    </h6>
                                </div>
                                <div class="col-md-2">
                                    <form action="" method="get">
                                        @if (request()->has('q'))
                                            <input type="hidden" name="q" value="{{ request()->q }}">
                                        @endif
                                        <select class="form-control form-control-user" name="search"
                                            onchange="this.form.submit()">
                                            <option value="" selected disabled hidden>Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if (request()->search == $category->id) selected @endif>{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            @endif
                            @if ($jenisuang->id == 1)
                                <div class="col-md-5">
                                    <h6 class="font-weight-bold text-danger">Rp.
                                        {{ number_format(!request()->has('search2') ? $jenisuang->categoryMasuksTotal() : $jenisuang->categoryMasukTotal(request()->search2)) }}
                                    </h6>
                                </div>
                                <div class="col-md-2">
                                    <form action="" method="get">
                                        @if (request()->has('q'))
                                            <input type="hidden" name="q" value="{{ request()->q }}">
                                        @endif
                                        <select class="form-control form-control-user" name="search2"
                                            onchange="this.form.submit()">
                                            <option value="" selected disabled hidden>Category</option>
                                            @foreach (App\Models\CategoryMasuk::all() as $category)
                                                <option value="{{ $category->id }}" @if (request()->search2 == $category->id) selected @endif>{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            @endif
                        </div>
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
                                    @forelse ($transactions as $transaction)
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
                                                    {{ $transaction->category_masuk->nama }}
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
                                    @forelse ($transactions as $transaction)
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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        @include('layouts.footer')
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
