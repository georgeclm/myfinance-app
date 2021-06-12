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

                    <div class="form-group">
                        <input type="number" name="jumlah" value="{{ old('jumlah') }}" required placeholder="Jumlah"
                            class="form-control form-control-user @error('jumlah') is-invalid @enderror">
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
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('rekening').submit();">Add</a>

            </div>
        </div>
    </div>
</div>
