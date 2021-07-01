<div class="bg-dark border-0 card shadow mb-4">
    <div class="bg-gray-100 border-0 card-header py-3">
        <div class="row align-items-baseline">
            <div class="col-md-5">
                <h6 class="font-weight-bold text-primary">{{ $jenisuang->nama }}</h6>
            </div>
            @if ($jenisuang->id == 2)
                <div class="col-md-5 my-2">
                    <h6 class="font-weight-bold text-danger">Rp.
                        {{ number_format(!$search ? $jenisuang->categoriesTotal() : $jenisuang->categoryTotal($search)) }}
                    </h6>
                </div>
                <div class="col-md-2">
                    {{-- <input type="hidden" wire:model="q" value="{{ request()->q }}"> --}}
                    <select wire:model="search" class="form-control form-control-user" onchange="$wire.render()">
                        <option value="0" selected>Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if ($jenisuang->id == 1)
                <div class="col-md-5 my-2">
                    <h6 class="font-weight-bold text-success">Rp.
                        {{ number_format(!$search2 ? $jenisuang->categoryMasuksTotal() : $jenisuang->categoryMasukTotal($search2)) }}
                    </h6>
                </div>
                <div class="col-md-2">
                    {{-- <input type="hidden" wire:model="q" value="{{ request()->q }}"> --}}
                    <select wire:model="search2" class="form-control form-control-user" onchange="$wire.render()">
                        <option value="0" selected>Category</option>
                        @foreach (App\Models\CategoryMasuk::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="wrap-table100 " id="thetable">
                <div class="table">
                    @forelse ($transactions as $transaction)
                        <div class="row">
                            <div class="cell {{ $jenisuang->textColor() }}" data-title="Jumlah">
                                Rp. {{ number_format($transaction->jumlah) }}
                            </div>
                            @if ($transaction->utang_id)
                                <div class="cell text-white" data-title="Nama Utang">
                                    {{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                </div>
                            @endif
                            @if ($transaction->utangteman_id)
                                <div class="cell text-white" data-title="Nama Utang">
                                    {{ $transaction->utangteman->keterangan ?? $transaction->utangteman->nama }}
                                </div>
                            @endif
                            @if ($jenisuang->id == 1)
                                <div class="cell text-white" data-title="Kategori">
                                    {{ $transaction->category_masuk->nama }}
                                </div>
                            @endif
                            @if ($jenisuang->id == 2)
                                <div class="cell text-white" data-title="Kategori">
                                    {{ $transaction->category->nama }}
                                </div>
                            @endif
                            <div class="cell text-white" data-title="Akun">
                                {{ $transaction->rekening->nama_akun }}
                            </div>
                            @if ($jenisuang->id == 3)
                                <div class="cell text-white" data-title="Akun Tujuan">
                                    {{ $transaction->rekening_tujuan->nama_akun }}
                                </div>
                            @endif
                            <div class="cell text-white" data-title="Keterangan">
                                {{ $transaction->keterangan }}
                            </div>
                            <div class="cell text-white" data-title="Tanggal">
                                {{ $transaction->created_at->format('l j F Y') }}
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <table class="table table-bordered table-dark" width="100%" cellspacing="0" id="bigtable">
                <thead>
                    <tr class="{{ $jenisuang->color() }} text-light">
                        <th>Jumlah</th>
                        @if (in_array($jenisuang->id, [4, 5]))
                            <th>Nama Utang</th>
                        @endif
                        @if (in_array($jenisuang->id, [1, 2]))
                            <th>Kategori</th>
                        @endif
                        <th>Akun</th>
                        @if ($jenisuang->id == 3)
                            <th>Akun Tujuan</th>
                        @endif
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>Rp. {{ number_format($transaction->jumlah) }}</td>
                            @if ($transaction->utang_id)
                                <td>{{ $transaction->utang->keterangan ?? $transaction->utang->nama }}
                                </td>
                            @endif
                            @if ($transaction->utangteman_id)
                                <td>{{ $transaction->utangteman->keterangan ?? $transaction->utangteman->nama }}
                                </td>
                            @endif
                            @if ($jenisuang->id == 1)
                                <td>{{ $transaction->category_masuk->nama }}</td>
                            @endif
                            @if ($jenisuang->id == 2)
                                <td>{{ $transaction->category->nama }}</td>
                            @endif
                            <td>{{ $transaction->rekening->nama_akun }}</td>
                            @if ($transaction->rekening_tujuan)
                                <td>{{ $transaction->rekening_tujuan->nama_akun }}</td>
                            @endif
                            <td>{{ $transaction->keterangan ?? '-' }}</td>
                            <td>{{ $transaction->created_at->format('l j F Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Transaksi Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
