<div class="modal fade" id="editmodal-{{ $utang->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">
                    Update
                    Friends Debt
                </h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="{{ $utang->id }}form" method="POST" action="{{ route('utangtemans.update', $utang) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="nama" value="{{ old('nama') ?? $utang->nama }}" required
                            placeholder="Debt to who" class="form-control form-control-user">
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" data-number-stepfactor="100" disabled value="{{ $utang->jumlah }}" x
                            placeholder="Jumlah Utang" class="currency form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="keterangan" value="{{ old('keterangan') ?? $utang->keterangan }}" x
                            placeholder="Description" class="form-control form-control-user">
                    </div>
                </form>
            </div>
            <div class="modal-footer  border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="{{ $utang->id }}form" value="Edit" />
            </div>
        </div>
    </div>
</div>
