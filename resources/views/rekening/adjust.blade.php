<div class="modal fade" id="adjustmodal-{{ $rekening->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Sesuaikan Nominal
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <b> Saldo Anda saat ini</b>
                <br>
                Saldo {{ $rekening->nama }} : Rp. {{ number_format($rekening->saldo_sekarang) }}
                <hr>
                <b> Penyesuaian Nominal</b>
                <br>
                Aktual Nominal Anda
                <form class="mt-2" id="{{ $rekening->id }}adjustform" method="POST"
                    action="{{ route('rekenings.adjust', $rekening) }}">
                    @csrf
                    <div class="hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" name="saldo_sekarang" placeholder="Isikan aktual nominal Anda" required
                            data-number-stepfactor="100" class="form-control currency">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="{{ $rekening->id }}adjustform" value="Save" />
            </div>
        </div>
    </div>
</div>
