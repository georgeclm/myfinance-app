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
                    <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">Rp.
                        {{ number_format($total) }}</a>
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Rekening</a>

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
                                        @if ($jenis->rekenings->count() != 0)
                                            @foreach ($jenis->rekenings as $rekening)
                                                <div class="modal fade" id="editmodal-{{ $rekening->id }}" role="dialog"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Update
                                                                    Rekening
                                                                </h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="user" id="{{ $rekening->id }}form"
                                                                    method="POST"
                                                                    action="{{ route('rekenings.update', $rekening) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <select
                                                                            class="form-control form-control-user form-block"
                                                                            style="padding: 0.5rem !important"
                                                                            aria-describedby="emailHelp" disabled>
                                                                            @foreach ($jeniss as $jenis)
                                                                                <option value="{{ $jenis->id }}" @if ($jenis->id == $rekening->jenis_id) selected @endif>
                                                                                    {{ $jenis->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control form-control-user "
                                                                            name="nama_akune"
                                                                            value="{{ old('nama_akune') ?? $rekening->nama_akun }}"
                                                                            required aria-describedby="emailHelp"
                                                                            placeholder="Nama Akun">
                                                                    </div>
                                                                    @if ($rekening->jenis_id != 1)
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control form-control-user "
                                                                                name="nama_banke"
                                                                                value="{{ old('nama_banke') ?? $rekening->nama_bank }}"
                                                                                required aria-describedby="emailHelp"
                                                                                placeholder="Nama Bank">
                                                                        </div>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <input type="number"
                                                                            class="form-control form-control-user "
                                                                            name="saldo_sekarange"
                                                                            value="{{ old('saldo_sekarange') ?? $rekening->saldo_sekarang }}"
                                                                            disabled aria-describedby="emailHelp"
                                                                            placeholder="Saldo Sekarang">
                                                                    </div>
                                                                    @if ($rekening->jenis_id == 2)
                                                                        <div class="form-group">
                                                                            <input type="number"
                                                                                class="form-control form-control-user "
                                                                                name="saldo_mengendape"
                                                                                value="{{ old('saldo_mengendape') ?? $rekening->saldo_mengendap }}"
                                                                                aria-describedby="emailHelp"
                                                                                placeholder="Saldo Mengendap">
                                                                        </div>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control form-control-user "
                                                                            name="keterangane"
                                                                            value="{{ old('keterangane') ?? $rekening->keterangan }}"
                                                                            aria-describedby="emailHelp"
                                                                            placeholder="Keterangan">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('rekenings.update', $rekening) }}"
                                                                    onclick="event.preventDefault();document.getElementById('{{ $rekening->id }}form').submit();">Edit</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <tr>
                                                    <td>{{ $rekening->nama_akun }}</td>
                                                    @if ($rekening->jenis_id != 1)
                                                        <td>{{ $rekening->nama_bank }}</td>
                                                    @endif
                                                    <td>Rp. {{ number_format($rekening->saldo_sekarang) }}</td>
                                                    @if ($rekening->jenis_id == 2)
                                                        <td>Rp. {{ number_format($rekening->saldo_mengendap) }}</td>
                                                    @endif
                                                    <td>{{ $rekening->keterangan }}</td>
                                                    <td> <button data-toggle="modal"
                                                            data-target="#editmodal-{{ $rekening->id }}" type="button"
                                                            class="btn btn-info btn-circle">
                                                            <i class="fas fa-info-circle"></i>
                                                        </button>
                                                    </td>

                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">Rekening Kosong</td>
                                            </tr>
                                        @endif

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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="addRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Rekening</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="rekening" method="POST" action="{{ route('rekenings.store') }}">
                        @csrf
                        <div class="form-group">
                            <select
                                class="form-control form-control-user form-block @error('jenis_id') is-invalid @enderror"
                                name="jenis_id" style="padding: 0.5rem !important" required" aria-describedby="emailHelp">
                                <option value="" selected disabled hidden>Pilih Jenis</option>
                                @foreach ($jeniss as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                            @error('jenis_id')
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
                                class="form-control form-control-user @error('nama_akun') is-invalid @enderror"
                                name="nama_akun" value="{{ old('nama_akun') }}" required aria-describedby="emailHelp"
                                placeholder="Nama Akun">
                            @error('nama_akun')
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
                                class="form-control form-control-user @error('nama_bank') is-invalid @enderror"
                                name="nama_bank" value="{{ old('nama_bank') }}" required aria-describedby="emailHelp"
                                id="nama_bank" placeholder="Nama Bank">
                            @error('nama_bank')
                                <script>
                                    $('#addRekening').modal('show');

                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number"
                                class="form-control form-control-user @error('saldo_sekarang') is-invalid @enderror"
                                name="saldo_sekarang" value="{{ old('saldo_sekarang') }}" required
                                aria-describedby="emailHelp" placeholder="Saldo Sekarang">
                            @error('saldo_sekarang') .
                                <script>
                                    $('#addRekening').modal('show');

                                </script>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number"
                                class="form-control form-control-user @error('saldo_mengendap') is-invalid @enderror"
                                name="saldo_mengendap" value="{{ old('saldo_mengendap') }}" aria-describedby="emailHelp"
                                id="saldo_mengendap" placeholder="Saldo Mengendap">
                            @error('saldo_mengendap')
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
                    <a class="btn btn-primary" href="{{ route('rekenings.store') }}"
                        onclick="event.preventDefault();document.getElementById('rekening').submit();">Add</a>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        // $(document).ready(function() {
        //     $('#1').DataTable();
        //     $('#2').DataTable();
        //     $('#3').DataTable();
        // });
        $('select').on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            console.log(valueSelected);
            if (valueSelected == 1) {
                $('#nama_bank').prop('disabled', true);
                $('#nama_bank').prop('required', false);
                $('#saldo_mengendap').prop('disabled', true);
                $('#saldo_mengendap').prop('required', false);
            } else if (valueSelected == 2) {
                $('#nama_bank').prop('disabled', false);
                $('#nama_bank').prop('required', true);
                $('#saldo_mengendap').prop('disabled', false);
                $('#saldo_mengendap').prop('required', true);

            } else {
                $('#saldo_mengendap').prop('disabled', true);
                $('#saldo_mengendap').prop('required', false);


            }
        });

    </script>
@endsection
