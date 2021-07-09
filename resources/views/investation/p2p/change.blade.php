<div class="modal fade" id="change-{{ $p2p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Ubah Tujuan Invest P2P</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formchange-{{ $p2p->id }}" method="POST"
                    action="{{ route('p2ps.update.tujuan', $p2p) }}">
                    @csrf
                    @method('PUT')
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
                        <input data-number-stepfactor="100" type="number" value="{{ $p2p->harga_jual }}" disabled
                            placeholder="Expected Maturity Amount" class="currency form-control form-control-user ">
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="jatuh_tempo"
                            value="{{ $p2p->jatuh_tempo }}" />
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block " style="padding: 0.5rem !important"
                            required aria-describedby="emailHelp" disabled>
                            <option value="" selected disabled hidden>Dari Akun</option>
                            @foreach (auth()->user()->rekenings as $rekening)
                                <option @if ($rekening->id == $p2p->rekening_id) selected @endif value="{{ $rekening->id }}">
                                    {{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('financial_plan_id') is-invalid @enderror"
                            name="financial_plan_id" style="padding: 0.5rem !important" required>
                            <option value="" selected disabled hidden>Tujuan Investasi</option>
                            @foreach (auth()->user()->financialplans as $financialplan)
                                <option @if ($financialplan->id == $p2p->financial_plan_id) selected @endif value="{{ $financialplan->id }}"
                                    @if ($financialplan->jumlah >= $financialplan->target) hidden
                            @endif>{{ $financialplan->nama }} - Rp.
                            {{ number_format($financialplan->target) }}</option>
                            @endforeach
                        </select>
                        @error('financial_plan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user " value="{{ $p2p->keterangan }}"
                            placeholder="Keterangan" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="formchange-{{ $p2p->id }}" value="Update" />
            </div>
        </div>
    </div>
</div>
