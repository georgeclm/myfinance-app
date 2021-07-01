<div class="modal fade" id="addRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Utang Baru</h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rekening" method="POST" action="{{ route('utangs.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="lunas" value="0">
                    <div class="form-group">
                        <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Utang ke Siapa"
                            class="form-control form-control-user @error('nama') is-invalid @enderror">
                        @error('nama')
                            <script>
                                $('#addRekening').modal('show');
                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('rekening_id') is-invalid @enderror"
                            name="rekening_id" style="padding: 0.5rem !important" required aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Untuk Akun</option>
                            @foreach (auth()->user()->rekenings as $rekening)
                                <option value="{{ $rekening->id }}">{{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                        @error('rekening_id')
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
                        <input type="number" data-number-stepfactor="100" name="jumlah" value="{{ old('jumlah') }}"
                            required placeholder="Jumlah"
                            class="currency form-control form-control-user @error('jumlah') is-invalid @enderror">
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
                        <input type="text" name="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan"
                            class="form-control form-control-user @error('keterangan') is-invalid @enderror">
                        @error('keterangan')
                            <script>
                                $('#addRekening').modal('show');
                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="rekening" value="Add" />
            </div>
        </div>
    </div>
</div>
