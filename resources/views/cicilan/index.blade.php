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
                        <h1 class="h3 mb-2 text-white">Repetition</h1>
                        @if (!auth()->user()->rekenings->isEmpty())
                            <a href="#" data-toggle="modal" data-target="#addCicilan"
                                class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Add</a>
                        @endif
                    </div>
                    <div class="row">
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
                                    <table class="table table-bordered table-dark" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="{{ $jenisuang->color() }} text-light">
                                                <th>Name</th>
                                                <th>Total</th>
                                                <th>Repetition (Month) </th>
                                                <th>Date</th>
                                                @if (in_array($jenisuang->id, [4, 5]))
                                                    <th>Debt Name</th>
                                                @endif
                                                @if (in_array($jenisuang->id, [1, 2]))
                                                    <th>Category</th>
                                                @endif
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($jenisuang->cicilans->take(5) as $cicilan)
                                                @include('cicilan.delete')
                                                <tr>
                                                    <td>{{ $cicilan->nama }}</td>
                                                    <td>Rp. {{ number_format($cicilan->jumlah) }}</td>
                                                    <td>{{ $cicilan->sekarang }}/{{ $cicilan->bulan }}
                                                    </td>
                                                    <td>{{ $cicilan->tanggal }}</td>
                                                    @if ($cicilan->utang_id)
                                                        <td>{{ $cicilan->utang->keterangan ?? $cicilan->utang->nama }}
                                                        </td>
                                                    @endif
                                                    @if ($cicilan->utangteman_id)
                                                        <td>{{ $cicilan->utangteman->keterangan ?? $cicilan->utangteman->nama }}
                                                        </td>
                                                    @endif
                                                    @if ($jenisuang->id == 1)
                                                        <td>{{ $cicilan->category_masuk->nama }}</td>
                                                    @endif
                                                    @if ($jenisuang->id == 2)
                                                        <td>{{ $cicilan->category->nama }}</td>
                                                    @endif
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-caret-down"></i>
                                                            </button>
                                                            <div class=" bg-dark border-0  dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a data-toggle="modal"
                                                                    data-target="#deletemodal-{{ $cicilan->id }}"
                                                                    class="dropdown-item text-white" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada Pengulangan</td>
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
                @include('layouts.footer')
            </div>
        </div>
        <!-- End of Main Content -->
    </div>
    @include('cicilan.create')

@endsection
