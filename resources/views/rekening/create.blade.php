<div class="modal fade" id="addRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white" id="exampleModalLabel">New Pocket</h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rekening" method="POST" action="{{ route('rekenings.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('jenis_id') is-invalid @enderror"
                            name="jenis_id" style="padding: 0.5rem !important" required>
                            <option value="" selected disabled hidden>Choose Type</option>
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
                        <input type="text" id="nama-akun"
                            class="form-control form-control-user @error('nama_akun') is-invalid @enderror"
                            name="nama_akun" value="{{ old('nama_akun') }}" required placeholder="Pocket Name"
                            disabled>
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
                            placeholder="Nama Bank" disabled>
                        @error('nama_bank')
                            <script>
                                $('#addRekening').modal('show');
                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" data-number-stepfactor="100"
                            class="form-control form-control-user @error('saldo_sekarang') is-invalid @enderror currency"
                            name="saldo_sekarang" value="{{ old('saldo_sekarang') }}" required disabled
                            id="saldo_sekarang" placeholder="Current Balance">
                        @error('saldo_sekarang') .
                            <script>
                                $('#addRekening').modal('show');
                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" data-number-stepfactor="100"
                            class="currency form-control form-control-user @error('saldo_mengendap') is-invalid @enderror"
                            name="saldo_mengendap" value="{{ old('saldo_mengendap') }}" id="saldo_mengendap"
                            placeholder="Balance Settles" disabled>
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
                            name="keterangan" value="{{ old('keterangan') }}" id="keterangan"
                            placeholder="Description" disabled>
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
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="rekening" value="Add" />
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
            $('#nama-akun').prop('disabled', false);
            $('#nama-bank').prop('disabled', false);
            $('#saldo_mengendap').prop('disabled', false);
            $('#saldo_sekarang').prop('disabled', false);
            $('#keterangan').prop('disabled', false);
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
                $('#nama_bank').prop('disabled', false);
                $('#nama_bank').prop('required', true);
                $('#saldo_mengendap').prop('disabled', true);
                $('#saldo_mengendap').prop('required', false);
            }
        });
    </script>

@endsection
