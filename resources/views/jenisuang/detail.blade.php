@extends('layouts.app')

@section('content')
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.sidebar')
            <div class="bg-black">
                <br>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-white">{{ $jenisuang->nama }}</h1>
                    </div>
                    <div class="row">
                        @include('layouts.partials.income')
                        @include('layouts.partials.spending')
                        @include('layouts.partials.balance')
                        <div class="small-when-0 col-xl-3 col-md-6 mb-4">
                            <div class="bg-gray-100 border-0 card shadow h-100 py-2 border-bottom-info">
                                <div class="h3 fw-bold text-info card-body">
                                    <form action="" method="get">
                                        <select class="form-control form-control-user" name="q"
                                            onchange="this.form.submit()">
                                            <option value="0" selected disabled hidden>This Month</option>
                                            <option value="1" @if (request()->q == 1) selected @endif>Previous Month</option>
                                            <option value="2" @if (request()->q == 2) selected @endif>All</option>

                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="small-when-0 col-xl-12 col-md-12 mb-4">
                            <div class="bg-gray-100 border-0 card shadow h-100 py-2 border-bottom-warning">
                                <div class="h3 fw-bold text-info card-body text-center">
                                    <form autocomplete="off" action="" method="get" id="date_submit">
                                        <input class="form-control" type="text" name="daterange"
                                            value="{{ request()->daterange ?? 'This Month' }}" />
                                        <input type="submit"
                                            class="mt-2 d-sm-inline-block btn btn-dark btn-secondary shadow-sm"
                                            value="Custom" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->rekenings->isEmpty())
                            @include('layouts.partials.newaccount')
                        @endif
                    </div>
                    <livewire:detail-table :jenisuang="$jenisuang" />
                </div>
                @include('layouts.footer')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#bigtable').DataTable({
                paging: false,
                columnDefs: [{
                    type: 'formatted-num',
                    targets: 0
                }]
            });
        });
        jQuery.extend(jQuery.fn.dataTableExt.oSort, {
            "formatted-num-pre": function(a) {
                a = (a === "-" || a === "") ? 0 : a.replace(/[^\d\-\.]/g, "");
                return parseFloat(a);
            },

            "formatted-num-asc": function(a, b) {
                return a - b;
            },

            "formatted-num-desc": function(a, b) {
                return b - a;
            }
        });
    </script>

@endsection
@section('style')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/data-tables.css') }}" rel="stylesheet">

@endsection
