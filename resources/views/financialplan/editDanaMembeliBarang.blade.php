<div class="modal fade" id="editmodal-{{ $financialplan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark  modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white">Dana Membeli Barang</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close text-white">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formeditmodal-{{ $financialplan->id }}" method="POST"
                    action="{{ route('financialplans.danabelibarang.update', $financialplan) }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') ?? $financialplan->nama }}" placeholder="Nama Barang"
                            required>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="target"
                            value="{{ old('target') ?? $financialplan->target + $financialplan->dana_awal }}" required
                            placeholder="Harga Barang Saat Ini"
                            class="currency form-control form-control-user @error('target') is-invalid @enderror">
                        @error('target')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <input type="text" maxlength="2"
                            class="form-control form-control-user @error('bulan') is-invalid @enderror" name="bulan"
                            value="{{ old('bulan') ?? $financialplan->bulan }}"
                            placeholder="Berapa lama lagi Anda akan membeli" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">bulan</span>
                        </div>
                        @error('bulan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 hide-inputbtns input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input data-number-stepfactor="100" type="number" name="jumlah"
                            value="{{ old('jumlah') ?? $financialplan->dana_awal }}" required
                            placeholder="Dana yang telah tersedia"
                            class="currency form-control form-control-user @error('jumlah') is-invalid @enderror">
                        @error('jumlah')
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
