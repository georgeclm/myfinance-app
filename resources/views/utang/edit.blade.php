<div class="modal fade" id="editmodal-{{ $utang->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white">
                    Update
                    Utang
                </h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="{{ $utang->id }}form" method="POST" action="{{ route('utangs.update', $utang) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="nama" value="{{ old('nama') ?? $utang->nama }}" required
                            placeholder="Utang ke Siapa" class="form-control form-control-user">
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" disabled value="{{ $utang->jumlah }}"
                            placeholder="Jumlah Utang" class="currency form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="keterangan" value="{{ old('keterangan') ?? $utang->keterangan }}"
                            placeholder="Keterangan" class="form-control form-control-user">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="{{ $utang->id }}form" value="Edit" />
            </div>
        </div>
    </div>
</div>
