<div class="modal fade" id="addRekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Utang Teman Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="rekening" method="POST" action="{{ route('utangtemans.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="lunas" value="0">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}" required aria-describedby="emailHelp"
                            placeholder="Utang dari Siapa">
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
                <a class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('rekening').submit();">Add</a>

            </div>
        </div>
    </div>
</div>
