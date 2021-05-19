<div class="modal fade" id="editmodal-{{ $rekening->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Update
                    Rekening
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="{{ $rekening->id }}form" method="POST"
                    action="{{ route('rekenings.update', $rekening) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <select class="form-control form-control-user form-block" style="padding: 0.5rem !important"
                            aria-describedby="emailHelp" disabled>
                            @foreach ($jeniss as $jenis)
                                <option value="{{ $jenis->id }}" @if ($jenis->id == $rekening->jenis_id) selected @endif>
                                    {{ $jenis->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " name="nama_akune"
                            value="{{ old('nama_akune') ?? $rekening->nama_akun }}" required
                            aria-describedby="emailHelp" placeholder="Nama Akun">
                    </div>
                    @if ($rekening->jenis_id != 1)
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user " name="nama_banke"
                                value="{{ old('nama_banke') ?? $rekening->nama_bank }}" required
                                aria-describedby="emailHelp" placeholder="Nama Bank">
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user " name="saldo_sekarange"
                            value="{{ old('saldo_sekarange') ?? $rekening->saldo_sekarang }}" disabled
                            aria-describedby="emailHelp" placeholder="Saldo Sekarang">
                    </div>
                    @if ($rekening->jenis_id == 2)
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user " name="saldo_mengendape"
                                value="{{ old('saldo_mengendape') ?? $rekening->saldo_mengendap }}"
                                aria-describedby="emailHelp" placeholder="Saldo Mengendap">
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " name="keterangane"
                            value="{{ old('keterangane') ?? $rekening->keterangan }}" aria-describedby="emailHelp"
                            placeholder="Keterangan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('{{ $rekening->id }}form').submit();">Edit</a>

            </div>
        </div>
    </div>
</div>
