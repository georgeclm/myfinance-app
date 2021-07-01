<div class="modal fade" id="editmodal-{{ $financialplan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Dana Darurat</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formeditmodal-{{ $financialplan->id }}" method="POST"
                    action="{{ route('financialplans.danadarurat.update', $financialplan) }}">
                    @csrf
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="jumlah"
                            value="{{ old('jumlah') ?? $financialplan->perbulan }}" required
                            placeholder="Pengeluaran Bulanan"
                            class="currency form-control form-control-user @error('jumlah') is-invalid @enderror">
                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user form-block @error('status') is-invalid @enderror"
                            name="status" style="padding: 0.5rem !important" required aria-describedby="emailHelp">
                            <option value="" selected disabled hidden>Status Pernikahan</option>
                            <option value="1" @if ($financialplan->status_pernikahan == 1) selected @endif>Lajang</option>
                            <option value="2" @if ($financialplan->status_pernikahan == 2) selected @endif>Menikah</option>
                            <option value="3" @if ($financialplan->status_pernikahan == 3) selected @endif>Menikah dan memiliki anak</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="formeditmodal-{{ $financialplan->id }}"
                    value="Update" />
            </div>
        </div>
    </div>
</div>
