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
                        <h1 class="h3 mb-2 text-white">Your Debt</h1>
                        @if (auth()->user()->rekenings->isNotEmpty())
                            <a href="#" data-toggle="modal" data-target="#addRekening"
                                class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Add Your Debt</a>
                        @endif
                    </div>
                    <div class="row">
                        @if (!auth()->user()->utangs->isEmpty())
                            <!-- Income (Monthly) Card Example -->
                            <div class="small-when-0 col-xl-3 col-md-6 mb-4">
                                <div class="bg-gray-100 border-0 card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Total Debt</div>
                                                <div class="h7 mb-0 font-weight-bold text-danger">Rp.
                                                    {{ number_format(Auth::user()->totalutang()) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-wave fa-2x text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @include('layouts.partials.no_data', ['message' => 'Tumben Anda Tidak Ngutang'])
                        @endif
                        @include('layouts.partials.newaccount')
                    </div>
                    <!-- DataTales Example -->
                    <div class="bg-dark border-0 card shadow mb-4">
                        <div class="bg-gray-100 border-0 card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Debt</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Debt to who</th>
                                            <th>Total</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (auth()->user()->utangs as $utang)
                                            @include('utang.edit')
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
                                                <td colspan="5" class="text-center">Anda Tidak Punya Utang</td>
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
    </div>
    <!-- End of Page Wrapper -->
    @include('utang.create')
@endsection
