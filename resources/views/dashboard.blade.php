@extends('layouts.admin')
@section('dashboard')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6 mb-6">
            <!-- Sales Overview-->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Sales Overview</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="salesOverview" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesOverview">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center card-subtitle">
                            <div class="me-2">Total 42.5k Sales</div>
                            <div class="d-flex align-items-center text-success">
                                <p class="mb-0 fw-medium">+18%</p>
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
                                <h5 class="mb-0">8,458</h5>
                                <p class="mb-0">New Customers</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="icon-base ri ri-pie-chart-2-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">$28.5k</h5>
                                <p class="mb-0">Total Profit</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="icon-base ri ri-arrow-left-right-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">2,450k</h5>
                                <p class="mb-0">New Transactions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sales Overview-->

            <!-- Ratings -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h6 class="mb-2 text-nowrap">Ratings</h6>
                                    <div class="badge bg-label-primary rounded-pill lh-xs">Year of 2021</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0 me-2">8.14k</h4>
                                    <p class="mb-0 text-success">+15.6%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-ratings-illustration.png')}}" alt="Ratings"
                                    class="img-fluid" width="95" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Ratings -->

            <!-- Sessions -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h6 class="mb-2 text-nowrap">Sessions</h6>
                                    <div class="badge bg-label-success rounded-pill lh-xs">Last Month</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0 me-2">12.2k</h4>
                                    <p class="mb-0 text-danger">-25.5%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-session-illustration.png')}}" alt="Ratings"
                                    class="img-fluid" width="81" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sessions -->
        </div>
        <div class="row g-6">
            <!-- Activity Timeline -->
            <div class="col-12 col-md-7 col-xl-6 order-md-2 order-xl-0">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Activity Timeline</h5>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        <ul class="timeline card-timeline mb-0">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">12 Invoices have been paid</h6>
                                        <small class="text-body-secondary">12 min ago</small>
                                    </div>
                                    <p class="mb-2">Invoices have been paid to the company</p>
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="badge bg-lightest rounded-3">
                                            <img src="{{ asset('assets_2//img/icons/misc/pdf.png')}}" alt="img" width="20"
                                                class="me-2" />
                                            <span class="h6 mb-0 text-body">invoices.pdf</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-success"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">Client Meeting</h6>
                                        <small class="text-body-secondary">45 min ago</small>
                                    </div>
                                    <p class="mb-2">Project meeting with john @10:15am</p>
                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="avatar avatar-sm me-2">
                                                <img src="{{ asset('assets_2/img/avatars/1.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                                <small>CEO of ThemeSelection</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-info"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">Create a new project for client</h6>
                                        <small class="text-body-secondary">2 Day Ago</small>
                                    </div>
                                    <p class="mb-2">6 team members in a project</p>
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul
                                                    class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Vinnie Mostowy"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle" src="{{ asset('assets_2/img/avatars/5.png')}}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Allen Rieske"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle" src="{{ asset('assets_2/img/avatars/12.png')}}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Julee Rossignol"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle" src="{{ asset('assets_2/img/avatars/6.png')}}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li class="avatar">
                                                        <span class="avatar-initial rounded-circle pull-up text-heading"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="3 more">+3</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Activity Timeline -->
            
            <!-- Top Referral Source Mobile  -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Top Referral Sources</h5>
                            <p class="card-subtitle mb-0">Number of Sales</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn text-body-secondary p-0" type="button" id="earningReportsMobileTabsId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsMobileTabsId">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
                                        <img src="{{ asset('assets_2/img/products/apple-iPhone-13.png')}}" alt="Mobile"
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
                                        <img src="{{ asset('assets_2/img/products/apple-iMac-3k.png')}}" alt="Apple iMac 3k"
                                            class="img-fluid" />
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);"
                                    class="nav-link btn d-flex flex-column align-items-center justify-content-center"
                                    role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id-3"
                                    aria-controls="navs-orders-id-3" aria-selected="false">
                                    <div>
                                        <img src="{{ asset('assets_2/img/products/gaming-remote.png')}}" alt="Gaming Remote"
                                            class="img-fluid" />
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
                                            <th class="bg-transparent border-bottom">Image</th>
                                            <th class="bg-transparent border-bottom">Name</th>
                                            <th class="text-end bg-transparent border-bottom">Status</th>
                                            <th class="text-end bg-transparent border-bottom">Revenue</th>
                                            <th class="text-end bg-transparent border-bottom">Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/samsung-s22.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Samsung s22</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">Out of Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$12.5k</td>
                                            <td class="text-success fw-medium text-end">+24%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-iPhone-13-pro.png')}}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>iPhone 14 Pro</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">In Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$45k</td>
                                            <td class="text-danger fw-medium text-end">-18%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/oneplus-9-pro.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Oneplus 9 Pro</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-warning rounded-pill">Upcoming</div>
                                            </td>
                                            <td class="text-end fw-medium">$98.2k</td>
                                            <td class="text-success fw-medium text-end">+55%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/google-pixel-6.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Google Pixel 6</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">In Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$210k</td>
                                            <td class="text-success fw-medium text-end">+8%</td>
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
                                            <th class="bg-transparent border-bottom">Image</th>
                                            <th class="bg-transparent border-bottom">Name</th>
                                            <th class="text-end bg-transparent border-bottom">Status</th>
                                            <th class="text-end bg-transparent border-bottom">Revenue</th>
                                            <th class="text-end bg-transparent border-bottom">Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-mac-mini.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Apple Mac Mini</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">Out of Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$5,576</td>
                                            <td class="text-danger fw-medium text-end">-24%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/hp-envy-x360.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Newest HP Envy x360</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-info rounded-pill">In Draft</div>
                                            </td>
                                            <td class="text-end fw-medium">$5</td>
                                            <td class="text-success fw-medium text-end">+5%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/dell-inspiron-3000.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Dell Inspiron 3000</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">In Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$850</td>
                                            <td class="text-danger fw-medium text-end">-12%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/apple-iMac-4k.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Apple iMac 4k</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-danger rounded-pill">warning</div>
                                            </td>
                                            <td class="text-end fw-medium">$857</td>
                                            <td class="text-danger fw-medium text-end">-5%</td>
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
                                            <th class="bg-transparent border-bottom">Image</th>
                                            <th class="bg-transparent border-bottom">Name</th>
                                            <th class="text-end bg-transparent border-bottom">Status</th>
                                            <th class="text-end bg-transparent border-bottom">Revenue</th>
                                            <th class="text-end bg-transparent border-bottom">Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/sony-play-station-5.png')}}"
                                                    alt="Mobile" width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Sony Play Station 5</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-info rounded-pill">In Draft</div>
                                            </td>
                                            <td class="text-end fw-medium">$5</td>
                                            <td class="text-success fw-medium text-end">+5%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/xbox-series-x.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>XBOX Series X</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-primary rounded-pill">Out of Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$5,576</td>
                                            <td class="text-danger fw-medium text-end">-24%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/nintendo-switch.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>Nintendo Switch</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-warning rounded-pill">Upcoming</div>
                                            </td>
                                            <td class="text-end fw-medium">$2,857</td>
                                            <td class="text-success fw-medium text-end">+5%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets_2/img/products/sup-game-box-400.png')}}" alt="Mobile"
                                                    width="34" height="34" class="rounded" />
                                            </td>
                                            <td>SUP Game Box 400</td>
                                            <td class="text-end">
                                                <div class="badge bg-label-success rounded-pill">In Stock</div>
                                            </td>
                                            <td class="text-end fw-medium">$850</td>
                                            <td class="text-danger fw-medium text-end">-12%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Top Referral Source Mobile -->

            <!-- Data Tables -->
            <div class="col-xl-8 col-md-6">
                <div class="card overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-truncate">User</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate">Role</th>
                                    <th class="text-truncate">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/1.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                                <small class="text-truncate">@amiccoo</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-vip-crown-line icon-22px text-primary me-2"></i>
                                            <span>Admin</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/3.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                                                <small class="text-truncate">@brossiter15</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">estelle.Bailey10@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/2.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                                                <small class="text-truncate">@bemblinf</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">milo86@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-computer-line text-danger icon-22px me-2"></i>
                                            <span>Author</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/5.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                                                <small class="text-truncate">@bbinerh</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">lonnie35@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/4.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                                                <small class="text-truncate">@bkrabbe1d</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">ahmad_Collins@yahoo.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-pie-chart-2-line icon-22px text-info me-2"></i>
                                            <span>Maintainer</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/7.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                                                <small class="text-truncate">@brosebothamz</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-edit-box-line text-warning icon-22px me-2"></i>
                                            <span>Editor</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset('assets_2/img/avatars/6.png')}}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                                                <small class="text-truncate">@bkildayr</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">otho21@gmail.com</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-user-3-line icon-22px text-success me-2"></i>
                                            <span>Subscriber</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Data Tables -->

            <!-- visits By Day Chart-->
            <div class="col-xl-4 col-md-5 order-md-1 order-xl-0">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Visits by Day</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="visitsByDayDropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="visitsByDayDropdown">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 card-subtitle">Total 248.5k Visits</p>
                    </div>
                    <div class="card-body">
                        <div id="visitsByDayChart"></div>
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <h6 class="mb-0">Most Visited Day</h6>
                                <p class="mb-0 small">Total 62.4k Visits on Thursday</p>
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
            <!--/ visits By Day Chart-->
        </div>
    </div>
@endsection
