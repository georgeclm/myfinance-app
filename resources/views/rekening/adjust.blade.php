<div class="modal fade" id="adjustmodal-{{ $rekening->id }}" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">
                    Sesuaikan Nominal
                </h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-white">
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
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="{{ $rekening->id }}adjustform" value="Save" />
            </div>
        </div>
    </div>
</div>
