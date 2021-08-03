<div class="modal fade" id="change-{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Stock</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formchange-{{ $stock->id }}" method="POST"
                    action="{{ route('stocks.update.tujuan', $stock) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" value="{{ $stock->kode }}"
                            placeholder="Kode Stock" disabled>
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <input type="text" maxlength="3" class="form-control form-control-user" disabled
                            value="{{ $stock->lot }}" placeholder="Total" required>
                        <div class="input-group-append">
                            <span class="input-group-text">lot</span>
                        </div>
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" value="{{ $stock->harga_beli }}" required
                            placeholder="Harga Beli" class="currency form-control form-control-user " disabled>
                        <div class="input-group-append">
                            <span class="input-group-text">Per Lembar</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block" style="padding: 0.5rem !important"
                            disabled>
                            <option value="" selected disabled hidden>From Pocket</option>
                            @foreach (auth()->user()->rekenings as $rekening)
                                <option @if ($rekening->id == $stock->rekening_id) selected @endif value="{{ $rekening->id }}">
                                    {{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('financial_plan_id') is-invalid @enderror"
                            style="padding: 0.5rem !important" name="financial_plan_id">
                            <option value="" selected disabled hidden>Tujuan Investasi</option>
                            @foreach (auth()->user()->financialplans as $financialplan)
                                <option @if ($financialplan->id == $stock->financial_plan_id) selected @endif value="{{ $financialplan->id }}"
                                    @if ($financialplan->jumlah >= $financialplan->target) hidden
                            @endif>{{ $financialplan->nama }} - Rp.
                            {{ number_format($financialplan->target) }}</option>
                            @endforeach
                            @error('financial_plan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" value="{{ $stock->keterangan }}"
                            disabled placeholder="Description">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="formchange-{{ $stock->id }}" value="Update" />
            </div>
        </div>
    </div>
</div>
