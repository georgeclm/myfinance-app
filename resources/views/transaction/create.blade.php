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
                        <select disabled
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
                    <div class="form-group" id="utangteman">
                        <select disabled
                            class="form-control form-control-user form-block @error('utang_id') is-invalid @enderror"
                            name="utangteman_id" style="padding: 0.5rem !important" required"
                            aria-describedby="emailHelp">
                            <option selected disabled hidden>Utang Siapa</option>
                            @foreach (auth()->user()->utangtemans as $utang)
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
                        <input type="number" disabled
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
                        <input type="text" disabled
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
                        <select
                            class="form-control form-control-user form-block @error('category_id') is-invalid @enderror"
                            name="category_id" style="padding: 0.5rem !important" required id="category_id">
                            <option value="" selected disabled hidden>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <script>
                                $('#addRekening').modal('show');

                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select disabled
                            class="form-control form-control-user form-block @error('akun1') is-invalid @enderror"
                            name="akun1" style="padding: 0.5rem !important" required aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Pilih Akun</option>
                            @foreach (auth()->user()->rekenings as $rekening)
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
                        <select disabled
                            class="form-control form-control-user form-block @error('akun2') is-invalid @enderror"
                            name="akun2" style="padding: 0.5rem !important" required" aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Pilih Akun Tujuan</option>
                            @foreach (auth()->user()->rekenings as $rekening)
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
                        <input type="text" disabled
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
@section('script')

    <script>
        $('#jenisuang').on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            $('input').prop('disabled', false);
            $('select').prop('disabled', false);
            if (valueSelected == 1) {
                $('#kategori').show("slow");
                $('#category_id').hide("slow");
                $('#transfer').hide("slow");
                $('#utang').hide("slow");
                $('#utangteman').hide("slow");
            } else if (valueSelected == 2) {
                $('#kategori').hide("slow");
                $('#category_id').show("slow");
                $('#transfer').hide("slow");
                $('#utang').hide("slow");
                $('#utangteman').hide("slow");
            } else if (valueSelected == 4) {
                $('#kategori').hide("slow");
                $('#category_id').hide("slow");
                $('#transfer').hide("slow");
                $('#utang').show("slow");
                $('#utangteman').hide("slow");
            } else if (valueSelected == 3) {
                $('#kategori').hide("slow");
                $('#category_id').hide("slow");
                $('#transfer').show("slow");
                $('#utang').hide("slow");
                $('#utangteman').hide("slow");
            } else {
                $('#kategori').hide("slow");
                $('#category_id').hide("slow");
                $('#transfer').hide("slow");
                $('#utang').hide("slow");
                $('#utangteman').show("slow");
            }
        });

    </script>
@endsection
