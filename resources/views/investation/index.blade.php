@extends('layouts.app')

@section('content')
    <div id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.sidebar')
            <div class="bg-black">
                <br>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-white">Investasi</h1>
                        <a href="#" class="d-sm-inline-block btn btn-primary shadow-sm">Rp.
                            {{ number_format(Auth::user()->total_investments()) }}</a>

                    </div>
                    <ul class="list-group">
                        @foreach ($investations as $investation)
                            <a href="{{ route('stocks.index') }}"
                                class="list-group-item list-group-item-action bg-dark  d-flex align-items-center">
                                <div class="flex-grow-1 text-white">
                                    {{ $investation->nama }}
                                </div>
                                <div class="text-white">
                                    Rp. {{ number_format($investation->total) }}
                                </div>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <!-- /.container-fluid -->
                @include('layouts.footer')
            </div>
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
