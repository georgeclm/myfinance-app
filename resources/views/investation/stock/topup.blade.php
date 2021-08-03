<div class="modal fade" id="topup-{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="formtopup-{{ $stock->id }}" method="POST" action="{{ route('stocks.update', $stock) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('kode') is-invalid @enderror"
                            value="{{ old('kode') ?? $stock->kode }}" placeholder="Kode Stock" disabled>
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <input type="text" maxlength="3"
                            class="form-control form-control-user @error('lot') is-invalid @enderror" name="lot"
                            value="{{ old('lot') }}" placeholder="Total" required>
                        <div class="input-group-append">
                            <span class="input-group-text">lot</span>
                        </div>
                        @error('lot')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="harga_beli"
                            value="{{ old('harga_beli') }}" required placeholder="Harga Beli"
                            class="currency form-control form-control-user @error('harga_beli') is-invalid @enderror">
                        <div class="input-group-append">
                            <span class="input-group-text">Per Lembar</span>
                        </div>
                        @error('harga_beli')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('rekening_id') is-invalid @enderror"
                            name="rekening_id" style="padding: 0.5rem !important" required aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>From Pocket</option>
                            @foreach (auth()->user()->rekenings as $rekening)
                                <option @if ($rekening->id == $stock->rekening_id) selected @endif value="{{ $rekening->id }}">
                                    {{ $rekening->nama_akun }}</option>
                            @endforeach
                        </select>
                        @error('rekening_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select
                            class="form-control form-control-user form-block @error('financial_plan_id') is-invalid @enderror"
                            style="padding: 0.5rem !important" disabled>
                            <option value="" selected disabled hidden>Tujuan Investasi</option>
                            @foreach (auth()->user()->financialplans as $financialplan)
                                <option @if ($financialplan->id == $stock->financial_plan_id) selected @endif value="{{ $financialplan->id }}"
                                    @if ($financialplan->jumlah >= $financialplan->target) hidden
                            @endif>{{ $financialplan->nama }} - Rp.
                            {{ number_format($financialplan->target) }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="text"
                            class="form-control form-control-user @error('keterangan') is-invalid @enderror"
                            name="keterangan" value="{{ old('keterangan') }}" id="keterangan"
                            placeholder="Description">
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="formtopup-{{ $stock->id }}" value="Update" />
            </div>
        </div>
    </div>
</div>
