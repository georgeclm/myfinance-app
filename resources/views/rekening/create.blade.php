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
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('jenis_id') is-invalid @enderror"
                            name="jenis_id" style="padding: 0.5rem !important" required>
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
                            name="nama_akun" value="{{ old('nama_akun') }}" required placeholder="Nama Akun">
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
                            name="nama_bank" value="{{ old('nama_bank') }}" required id="nama_bank"
                            placeholder="Nama Bank">
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
                            placeholder="Saldo Sekarang">
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
@section('script')
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
