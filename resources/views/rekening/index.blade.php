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
                    <h1 class="h3 mb-2 text-gray-800">Rekeningku</h1>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Rekening</a>
                </div>
                <div class="row">
                    @include('layouts.partials.totalbalance')
                    <!-- Income (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Setelah Utang</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">Rp.
                                            {{ number_format(Auth::user()->uang()) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-check-alt fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($jeniss as $jenis)
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $jenis->nama }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Akun</th>
                                            @if ($jenis->id != 1)
                                                <th>Nama Bank</th>
                                            @endif
                                            <th>Saldo Sekarang</th>
                                            @if ($jenis->id == 2)
                                                <th>Saldo Mengendap</th>
                                            @endif
                                            <th>Keterangan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jenis->user_rekenings as $rekening)
                                            @include('rekening.edit')
                                            @include('rekening.delete')
                                            @include('rekening.adjust')
                                            <tr>
                                                <td>{{ $rekening->nama_akun }}</td>
                                                @if ($rekening->jenis_id != 1)
                                                    <td>{{ $rekening->nama_bank }}</td>
                                                @endif
                                                <td>Rp. {{ number_format($rekening->saldo_sekarang) }}</td>
                                                @if ($rekening->jenis_id == 2)
                                                    <td>Rp. {{ number_format($rekening->saldo_mengendap) }}</td>
                                                @endif
                                                <td>{{ $rekening->keterangan ?? '-' }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-caret-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a data-toggle="modal"
                                                                data-target="#editmodal-{{ $rekening->id }}"
                                                                class="dropdown-item" href="#">Edit</a>
                                                            <a data-toggle="modal"
                                                                data-target="#deletemodal-{{ $rekening->id }}"
                                                                class="dropdown-item" href="#">Delete</a>
                                                            <a data-toggle="modal"
                                                                data-target="#adjustmodal-{{ $rekening->id }}"
                                                                class="dropdown-item" href="#">Sesuaikan</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('rekenings.show', $rekening) }}">Mutasi
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Rekening Kosong</td>
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
    @include('rekening.create')
@endsection
@section('script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
