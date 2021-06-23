@if (auth()->user()->rekenings->isEmpty())
    <div class="col-lg-6">
        <div class="bg-gray-100 card mb-4 py-3 border-0 border-left-success">
            <div class="card-body">
                <a href="{{ route('rekenings.index') }}"> Buat Rekening Dulu Sebelum Mencatat Keuangan</a>
            </div>
        </div>
    </div>
@endif
