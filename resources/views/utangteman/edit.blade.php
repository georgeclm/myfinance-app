<div class="modal fade" id="editmodal-{{ $utang->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Update
                    Utang Teman
                </h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="{{ $utang->id }}form" method="POST" action="{{ route('utangtemans.update', $utang) }}"
                    class="user">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="nama" value="{{ old('nama') ?? $utang->nama }}" required
                            placeholder="Utang ke Siapa" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="number" name="jumlah" disabled value="{{ $utang->jumlah }}" x
                            placeholder="Jumlah Utang" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="keterangan" value="{{ old('keterangan') ?? $utang->keterangan }}" x
                            placeholder="Keterangan" class="form-control form-control-user">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('{{ $utang->id }}form').submit();">Edit</a>

            </div>
        </div>
    </div>
</div>
