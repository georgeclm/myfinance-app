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
                        <h1 class="h3 mb-2 text-white">Utang Teman Anda</h1>
                        @if (auth()->user()->rekenings->isNotEmpty())
                            <a href="#" data-toggle="modal" data-target="#addRekening"
                                class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Tambah Utang Teman Anda</a>
                        @endif
                    </div>
                    <div class="row">
                        <!-- Income (Monthly) Card Example -->
                        @if (!$utangs->isEmpty())
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="bg-gray-100 border-0 card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Utang Teman Anda</div>
                                                <div class="h5 mb-0 font-weight-bold text-success">Rp.
                                                    {{ number_format(Auth::user()->totalutangteman()) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-donate fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div class="bg-gray-100 border-0 card mb-4 py-3 border-left-success">
                                    <div class="card-body">
                                        Tumben Teman Anda Tidak Ngutang
                                    </div>
                                </div>
                            </div>
                        @endif
                        @include('layouts.partials.newaccount')

                    </div>
                    <!-- DataTales Example -->
                    <div class="bg-gray-100 border-0 card shadow mb-4">
                        <div class="bg-gray-100 border-0 card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Utang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%" cellspacing="0" class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th>Utang dari Siapa</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($utangs as $utang)
                                            @include('utangteman.edit')
                                            <tr>
                                                <td>{{ $utang->nama }}</td>
                                                <td>Rp. {{ number_format($utang->jumlah) }}</td>
                                                <td>{{ $utang->keterangan }}</td>
                                                <td>{{ $utang->created_at->format('l j F Y') }}</td>
                                                <td> <button data-toggle="modal"
                                                        data-target="#editmodal-{{ $utang->id }}" type="button"
                                                        class="btn btn-info btn-circle">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tumben Teman Anda Tidak Ngutang</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
    <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->
    @include('utangteman.create')
@endsection
@section('script')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
