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
                    <a href="#" data-toggle="modal" data-target="#addRekening"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Tambah Transaksi</a>
                </div>
                @foreach ($jenisuangs as $jenisuang)
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="@if ($jenisuang->id == 1) bg-success
                                    @elseif($jenisuang->id ==2 )bg-danger @elseif($jenisuang->id ==
                                    3)bg-primary @elseif($jenisuang->id == 4)bg-warning @endif
                                        text-light">
                                        @if ($jenisuang->id == 4)
                                            <th>Nama Utang</th>
                                        @endif
                                        <th>Jumlah</th>
                                        @if ($jenisuang->id != 3 && $jenisuang->id != 4)
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
                                    @if ($jenisuang->transactions->count() != 0)
                                        @foreach ($jenisuang->transactions as $transaction)
                                            <tr>
                                                @if ($transaction->utang_id)
                                                    <td>{{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                                    </td>
                                                @endif
                                                <td>Rp. {{ number_format($transaction->jumlah) }}</td>
                                                @if ($jenisuang->id != 3 && $jenisuang->id != 4)
                                                    <td>{{ $transaction->kategori }}</td>
                                                @endif
                                                <td>{{ $transaction->rekening->nama_akun }}</td>
                                                @if ($transaction->rekening_tujuan)
                                                    <td>{{ $transaction->rekening_tujuan->nama_akun }}</td>
                                                @endif
                                                <td>{{ $transaction->keterangan }}</td>
                                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Transaksi Kosong</td>
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
                <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="rekening" method="POST" action="{{ route('transactions.store') }}">
                    @csrf
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('jenisuang_id') is-invalid @enderror"
                            name="jenisuang_id" style="padding: 0.5rem !important" required id="jenisuang"
                            aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Pilih Jenis</option>
                            @foreach ($jenisuangs as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenisuang_id')
                            <script>
                                $('#addRekening').modal('show');

                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" id="utang">
                        <select
                            class="form-control form-control-user form-block @error('utang_id') is-invalid @enderror"
                            name="utang_id" style="padding: 0.5rem !important" required" aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Utang Siapa</option>
                            @foreach (auth()->user()->utangs as $utang)
                                <option value="{{ $utang->id }}">
                                    {{ $utang->nama }}, {{ Str::limit($utang->keterangan, 30) }}</option>
                            @endforeach
                        </select>
                        @error('utang_id')
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
                    <div class="form-group" id="kategori">
                        <input type="text"
                            class="form-control form-control-user @error('kategori') is-invalid @enderror"
                            name="kategori" value="{{ old('kategori') }}" required aria-describedby="emailHelp"
                            placeholder="Kategori">
                        @error('kategori')
                            <script>
                                $('#addRekening').modal('show');

                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block @error('akun1') is-invalid @enderror"
                            name="akun1" style="padding: 0.5rem !important" required aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Pilih Akun</option>
                            @foreach ($rekenings as $rekening)
                                <option value="{{ $rekening->id }}">{{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                        @error('akun1')
                            <script>
                                $('#addRekening').modal('show');

                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group" id="transfer">
                        <select class="form-control form-control-user form-block @error('akun2') is-invalid @enderror"
                            name="akun2" style="padding: 0.5rem !important" required" aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Pilih Akun Tujuan</option>
                            @foreach ($rekenings as $rekening)
                                <option value="{{ $rekening->id }}">{{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                        @error('akun2')
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

<script>
    // $(document).ready(function() {
    //     $('#1').DataTable();
    //     $('#2').DataTable();
    //     $('#3').DataTable();
    // });
    $('#jenisuang').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        console.log(valueSelected);
        if (valueSelected == 1) {
            $('#kategori').show("slow");
            $('#transfer').hide("slow");
            $('#utang').hide("slow");
        } else if (valueSelected == 2) {
            $('#kategori').show("slow");
            $('#transfer').hide("slow");
            $('#utang').hide("slow");

        } else if (valueSelected == 4) {
            $('#kategori').hide("slow");
            $('#transfer').hide("slow");
            $('#utang').show("slow");

        } else {
            $('#kategori').hide("slow");
            $('#transfer').show("slow");
            $('#utang').hide("slow");

        }
    });

</script>
@endsection
