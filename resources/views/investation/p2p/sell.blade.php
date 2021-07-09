<div class="modal fade" id="sell-{{ $p2p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Sell P2P</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formsell-{{ $p2p->id }}" method="POST" action="{{ route('p2ps.sell', $p2p) }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " value="{{ $p2p->nama_p2p }}"
                            placeholder="Nama P2P" disabled>
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <input type="text" class="form-control form-control-user " value="{{ $p2p->bunga }}"
                            placeholder="Bunga" disabled>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" value="{{ $p2p->jumlah }}" disabled
                            placeholder="Amount" class="currency form-control form-control-user ">
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" value="{{ $p2p->harga_jual }}" required
                            placeholder="Expected Maturity Amount" name="harga_jual"
                            class="currency form-control form-control-user @error('harga_jual') is-invalid @enderror">
                        @error('harga_jual')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="jatuh_tempo"
                            value="{{ $p2p->jatuh_tempo }}" />
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block " style="padding: 0.5rem !important"
                            required aria-describedby="emailHelp" name="rekening_jual_id">
                            <option value="" selected disabled hidden>Amount to</option>
                            @foreach (auth()->user()->rekenings as $rekening)
                                <option @if ($rekening->id == $p2p->rekening_id) selected @endif value="{{ $rekening->id }}">
                                    {{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                        @error('rekening_jual_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block " style="padding: 0.5rem !important"
                            disabled>
                            <option value="" selected disabled hidden>Tujuan Investasi</option>
                            @foreach (auth()->user()->financialplans as $financialplan)
                                <option @if ($financialplan->id == $p2p->financial_plan_id) selected @endif value="{{ $financialplan->id }}"
                                    @if ($financialplan->jumlah >= $financialplan->target) hidden
                            @endif>{{ $financialplan->nama }} - Rp.
                            {{ number_format($financialplan->target) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " value="{{ $p2p->keterangan }}"
                            placeholder="Keterangan" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="formsell-{{ $p2p->id }}" value="Sell" />
            </div>
        </div>
    </div>
</div>
