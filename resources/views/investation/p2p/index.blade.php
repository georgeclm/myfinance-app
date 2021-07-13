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
                        <h1 class="h3 mb-2 text-white">Peer to Peer</h1>
                        @if (auth()->user()->rekenings->isNotEmpty() &&
        auth()->user()->financialplans->isNotEmpty())
                            <a href="#" data-toggle="modal" data-target="#p2p"
                                class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Tambah P2P</a>
                        @endif
                    </div>
                    <div class="row">
                        @if (auth()->user()->p2ps->count() > 0)
                            <div class="small-when-0 col-xl-3 col-md-6 mb-4">
                                <div class="bg-gray-100 border-0 card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total P2P</div>
                                                <div class="h5 mb-0 font-weight-bold text-success">Rp.
                                                    {{ number_format(Auth::user()->total_p2ps()) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-handshake fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="small-when-0 col-xl-3 col-md-6 mb-4">
                                <div class="bg-gray-100 border-0 card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Earnings</div>
                                                <div class="h5 mb-0 font-weight-bold text-primary">Rp.
                                                    {{ number_format(Auth::user()->total_p2p_gain_or_loss()) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @include('layouts.partials.no_data', ['message' => 'Buat Rencana Keuangan Dulu untuk Invest'])
                        @endif
                    </div>
                    <div class="card-body small-when-0">
                        @forelse (auth()->user()->p2ps as $p2p)
                            @include('investation.p2p.change')
                            @include('investation.p2p.sell')
                            <div class="bg-dark border-0 card shadow mb-4">
                                <div
                                    class="bg-gray-100 border-0 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $p2p->nama_p2p }} - Rp.
                                        {{ number_format($p2p->harga_jual) }}
                                    </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="bg-dark border-0 dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item text-white" data-toggle="modal"
                                                data-target="#change-{{ $p2p->id }}" href="#">Ubah Tujuan</a>
                                            <a class="dropdown-item text-white" data-toggle="modal"
                                                data-target="#sell-{{ $p2p->id }}" href="#">Jual</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body text-white">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            Amount : Rp. {{ number_format($p2p->jumlah) }}<br />
                                            {{ $p2p->jatuh_tempo }}
                                        </div>
                                        {{ number_format($p2p->bunga, 1) }} %
                                    </div>
                                </div>
                            </div>
                        @empty
                            @include('layouts.partials.no_data', ['message' => 'Start Add P2P to Your Asset'])
                        @endforelse
                    </div>
                </div>
                <!-- /.container-fluid -->
                @include('layouts.footer')
            </div>
        </div>
        @include('investation.p2p.create')
        <!-- End of Main Content -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
@section('script')
<script>
    $(function() {
        $('input[name="jatuh_tempo"]').daterangepicker({
            singleDatePicker: true,
            "locale": {
                "format": "YYYY-MM-DD",
                "separator": " / ",
            },
        });
    });
</script>
@endsection
