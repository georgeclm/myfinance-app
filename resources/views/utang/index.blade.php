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
                    <h1 class="h3 mb-2 text-gray-800">Utang Anda</h1>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Utang Anda</a>
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Utang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Utang ke Siapa</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($utangs->count() != 0)
                                        @foreach ($utangs as $utang)
                                            <div class="modal fade" id="editmodal-{{ $utang->id }}" role="dialog"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Update
                                                                Utang
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="user" id="{{ $utang->id }}form" method="POST"
                                                                action="{{ route('utangs.update', $utang) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        class="form-control form-control-user " name="nama"
                                                                        value="{{ old('nama') ?? $utang->nama }}" required
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Utang ke Siapa">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="number"
                                                                        class="form-control form-control-user "
                                                                        name="jumlah" disabled
                                                                        value="{{ $utang->jumlah }}" x
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Jumlah Utang">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        class="form-control form-control-user "
                                                                        name="keterangan"
                                                                        value="{{ old('keterangan') ?? $utang->keterangan }}"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Keterangan">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('utangs.update', $utang) }}"
                                                                onclick="event.preventDefault();document.getElementById('{{ $utang->id }}form').submit();">Edit</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <tr>
                                                <td>{{ $utang->nama }}</td>
                                                <td>Rp. {{ number_format($utang->jumlah) }}</td>
                                                <td>{{ $utang->keterangan }}</td>
                                                <td>{{ $utang->created_at->format('Y-m-d') }}</td>
                                                <td> <button data-toggle="modal"
                                                        data-target="#editmodal-{{ $utang->id }}" type="button"
                                                        class="btn btn-info btn-circle">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Utang Kosong</td>
                                        </tr>
                                    @endif
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
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="addRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Utang Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="rekening" method="POST" action="{{ route('utangs.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama') }}" required aria-describedby="emailHelp"
                                placeholder="Utang ke Siapa">
                            @error('nama')
                                <script>
                                    $('#addRekening').modal('show');

                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" id="kategori">
                            <input type="number"
                                class="form-control form-control-user @error('jumlah') is-invalid @enderror" name="jumlah"
                                value="{{ old('jumlah') }}" required aria-describedby="emailHelp" placeholder="Jumlah">
                            @error('jumlah')
                                <script>
                                    $('#addRekening').modal('show');

                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text"
                                class="form-control form-control-user @error('keterangan') is-invalid @enderror"
                                name="keterangan" value="{{ old('keterangan') }}" aria-describedby="emailHelp"
                                placeholder="Keterangan">
                            @error('keterangan')
                                <script>
                                    $('#addRekening').modal('show');

                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('transactions.store') }}"
                        onclick="event.preventDefault();document.getElementById('rekening').submit();">Add</a>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

@endsection
