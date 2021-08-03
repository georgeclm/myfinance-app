<div class="modal fade" id="DanaMenabung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Regular Savings Fund</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addDanaMenabung" method="POST" action="{{ route('financialplans.danamenabung') }}">
                    @csrf
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="target" value="{{ old('target') }}"
                            required placeholder="Dana yang mau diinvestasi"
                            class="currency form-control form-control-user @error('target') is-invalid @enderror">
                        @error('target')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="jumlah" value="{{ old('jumlah') }}"
                            required placeholder="Tambahaan Investasi Setiap Bulan"
                            class="currency form-control form-control-user @error('jumlah') is-invalid @enderror">
                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <input type="text" maxlength="2"
                            class="form-control form-control-user @error('bulan') is-invalid @enderror" name="bulan"
                            value="{{ old('bulan') }}" placeholder="Investasi berapa lama" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">bulan</span>
                        </div>
                        @error('bulan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer border-0">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" form="addDanaMenabung" value="Add" />
            </div>
        </div>
    </div>
</div>
