                    <!-- Income (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Income @if (request()->q == 2)@else
                                                (Monthly)
                                            @endif
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-success">Rp.
                                            {{ number_format(Auth::user()->uangmasuk()) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-wave-alt fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
