<div class="modal fade" id="editmodal-{{ $utang->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Update
                    Utang
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="{{ $utang->id }}form" method="POST"
                    action="{{ route('utangs.update', $utang) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " name="nama"
                            value="{{ old('nama') ?? $utang->nama }}" required aria-describedby="emailHelp"
                            placeholder="Utang ke Siapa">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user " name="jumlah" disabled
                            value="{{ $utang->jumlah }}" x aria-describedby="emailHelp" placeholder="Jumlah Utang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " name="keterangan"
                            value="{{ old('keterangan') ?? $utang->keterangan }}" aria-describedby="emailHelp"
                            placeholder="Keterangan">
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
