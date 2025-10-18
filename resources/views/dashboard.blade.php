@extends('layouts.admin')
@section('dashboard')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6 mb-6">
            <!-- Sales Overview-->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Vue d’ensemble du système</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="salesOverview" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="overviewMenu">
                                    <a class="dropdown-item" href="javascript:void(0);">Actualiser</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Exporter</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mettre à jour</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center card-subtitle">
                            <div class="me-2">total_425k_sales</div>
                            <div class="d-flex align-items-center text-success">
                                <p class="mb-0 fw-medium">18</p>
                                <i class="icon-base ri ri-arrow-up-s-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-wrap gap-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="icon-base ri ri-user-star-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">8458</h5>
                                <p class="mb-0">new_customers</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="icon-base ri ri-pie-chart-2-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">285k</h5>
                                <p class="mb-0">total_profit</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="icon-base ri ri-arrow-left-right-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">2450k</h5>
                                <p class="mb-0">new_transactions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ratings -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h6 class="mb-2 text-nowrap">Utilisateurs inscrits</h6>
                                    <div class="badge bg-label-primary rounded-pill lh-xs">2025</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0 me-2">814k</h4>
                                    <p class="mb-0 text-success">156</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-ratings-illustration.png') }}"
                                    alt="Ratings" class="img-fluid" width="95" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sessions -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h6 class="mb-2 text-nowrap">sessions</h6>
                                    <div class="badge bg-label-success rounded-pill lh-xs">last_month</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0 me-2">122k</h4>
                                    <p class="mb-0 text-danger">255</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-session-illustration.png') }}"
                                    alt="Ratings" class="img-fluid" width="81" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-6">
            <!-- Activity Timeline -->
            <div class="col-12 col-md-7 col-xl-6 order-md-2 order-xl-0">
                <!-- visits By Day Chart-->

                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">visits_by_day</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="visitsByDayDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="visitsByDayDropdown">
                                    <a class="dropdown-item" href="javascript:void(0);">refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">share</a>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 card-subtitle">total_2485k_visits</p>
                    </div>
                    <div class="card-body">
                        <div id="visitsByDayChart"></div>
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <h6 class="mb-0">most_visited_day</h6>
                                <p class="mb-0 small">total_624k_visits_on_thursday</p>
                            </div>
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="icon-base ri ri-arrow-right-s-line icon-24px scaleX-n1-rtl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--/ Activity Timeline -->

            <!-- Top Referral Source Mobile  -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">top_referral_sources</h5>
                            <p class="card-subtitle mb-0">number_of_sales</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn text-body-secondary p-0" type="button" id="earningReportsMobileTabsId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsMobileTabsId">
                                <a class="dropdown-item" href="javascript:void(0);">view_more</a>
                                <a class="dropdown-item" href="javascript:void(0);">delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="nav nav-tabs nav-tabs-widget pb-6 gap-4 mx-1 d-flex flex-nowrap align-items-center"
                            role="tablist">
                            <li class="nav-item">
                                <a href="javascript:void(0);"
                                    class="nav-link btn active d-flex flex-column align-items-center justify-content-center"
                                    role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id-1"
                                    aria-controls="navs-orders-id-1" aria-selected="true">
                                    <div>
                                        <img src="{{ asset('assets_2/img/products/apple-iPhone-13.png') }}" alt="Mobile"
                                            class="img-fluid" />
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);"
                                    class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                    role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id-2"
                                    aria-controls="navs-orders-id-2" aria-selected="false">
                                    <div>
                                        <img src="{{ asset('assets_2/img/products/apple-iMac-3k.png') }}"
                                            alt="Apple iMac 3k" class="img-fluid" />
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);"
                                    class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                    role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id-3"
                                    aria-controls="navs-orders-id-3" aria-selected="false">
                                    <div>
                                        <img src="{{ asset('assets_2/img/products/gaming-remote.png') }}"
                                            alt="Gaming Remote" class="img-fluid" />
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);"
                                    class="nav-link btn d-flex align-items-center justify-content-center disabled"
                                    role="tab" data-bs-toggle="tab" aria-selected="false">
                                    <div class="avatar avatar-sm">
                                        <div class="avatar-initial bg-label-secondary text-body rounded">
                                            <i class="icon-base ri ri-add-line icon-22px"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-orders-id-1" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table border-top">
                                    <thead>
                                        <tr>
                                            <th class="bg-transparent border-bottom">image</th>
                                            <th class="bg-transparent border-bottom">name</th>
                                            <th class="text-end bg-transparent border-bottom">status</th>
                                            <th class="text-end bg-transparent border-bottom">revenue</th>
                                            <th class="text-end bg-transparent border-bottom">profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/samsung-s22.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>samsung_s22</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">out_of_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">125k</td>
                                            <td class="text-success fw-medium text-end">24</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-iPhone-13-pro.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>iphone_14_pro</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">in_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">45k</td>
                                            <td class="text-danger fw-medium text-end">18</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/oneplus-9-pro.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>oneplus_9_pro</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-warning rounded-pill">upcoming</div>
                                            </td>
                                            <td class="text-end fw-medium">982k</td>
                                            <td class="text-success fw-medium text-end">55</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/google-pixel-6.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>google_pixel_6</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">in_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">210k</td>
                                            <td class="text-success fw-medium text-end">8</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-orders-id-2" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table border-top">
                                    <thead>
                                        <tr>
                                            <th class="bg-transparent border-bottom">image</th>
                                            <th class="bg-transparent border-bottom">name</th>
                                            <th class="text-end bg-transparent border-bottom">status</th>
                                            <th class="text-end bg-transparent border-bottom">revenue</th>
                                            <th class="text-end bg-transparent border-bottom">profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-mac-mini.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>apple_mac_mini</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">out_of_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">5576</td>
                                            <td class="text-danger fw-medium text-end">24</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/hp-envy-x360.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>newest_hp_envy_x360</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-info rounded-pill">in_draft</div>
                                            </td>
                                            <td class="text-end fw-medium">5</td>
                                            <td class="text-success fw-medium text-end">5</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/dell-inspiron-3000.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>dell_inspiron_3000</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">in_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">850</td>
                                            <td class="text-danger fw-medium text-end">12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-iMac-4k.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>apple_imac_4k</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-danger rounded-pill">warning</div>
                                            </td>
                                            <td class="text-end fw-medium">857</td>
                                            <td class="text-danger fw-medium text-end">5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-orders-id-3" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table border-top">
                                    <thead>
                                        <tr>
                                            <th class="bg-transparent border-bottom">image</th>
                                            <th class="bg-transparent border-bottom">name</th>
                                            <th class="text-end bg-transparent border-bottom">status</th>
                                            <th class="text-end bg-transparent border-bottom">revenue</th>
                                            <th class="text-end bg-transparent border-bottom">profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/sony-play-station-5.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>sony_play_station_5</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-info rounded-pill">in_draft</div>
                                            </td>
                                            <td class="text-end fw-medium">5</td>
                                            <td class="text-success fw-medium text-end">5</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/xbox-series-x.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>xbox_series_x</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">out_of_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">5576</td>
                                            <td class="text-danger fw-medium text-end">24</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/nintendo-switch.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>nintendo_switch</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-warning rounded-pill">upcoming</div>
                                            </td>
                                            <td class="text-end fw-medium">2857</td>
                                            <td class="text-success fw-medium text-end">5</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/sup-game-box-400.png') }}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>sup_game_box_400</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">in_stock</div>
                                            </td>
                                            <td class="text-end fw-medium">850</td>
                                            <td class="text-danger fw-medium text-end">12</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Top Referral Source Mobile -->


        </div>
    </div>
@endsection
