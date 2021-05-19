                    <!-- Income (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Spending (Monthly)</div>
                                        <div class="h5 mb-0 font-weight-bold text-danger">Rp.
                                            {{ number_format(Auth::user()->uangkeluar()) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-funnel-dollar fa-2x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
