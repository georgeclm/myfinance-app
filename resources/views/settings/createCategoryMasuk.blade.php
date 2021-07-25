<div class="modal fade" id="addCategoryMasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="bg-dark modal-content">
            <div class="modal-header bg-gray-100 border-0">
                <h5 class="modal-title text-white" id="exampleModalLabel">New Category Uang Masuk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="rekening2" method="POST" action="{{ route('category_masuks.store') }}">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}" required placeholder="Nama Category">
                        @error('nama')
                            <script>
                                $('#addCategory').modal('show');
                            </script>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('rekening2').submit();">Add</a>
            </div>
        </div>
    </div>
</div>
