@extends('layouts.master')
@section('indexEmploi')

    <!--====== Start Page Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">@lang('extracted.emplois')</h1>
                            <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <section class="shop-section secondary-dark-bg pt-140 pb-100">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="show-text wow fadeInLeft">
                                    <span>Nombre d'offres : {{ $emplois->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="filter-dropdown float-md-end wow fadeInRight">
                                    <select class="wide" id="typeContratSelect">
                                        <option value="TOUT">@lang('extracted.tout')</option>
                                        <option value="STAGE">@lang('extracted.stage')</option>
                                        <option value="CDI">@lang('extracted.cdi')</option>
                                        <option value="CDD">@lang('extracted.cdd')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($emplois->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <strong>@lang('extracted.aucune_emploi_trouvee')</strong>
                        </div>
                    </div>
                @else
                    @foreach ($emplois as $emploi)
                        <div class="col-lg-4 col-md-6 col-sm-12 emploi-item"
                            data-type-contrat="{{ strtoupper($emploi->type_contrat) }}">
                            <div class="product-item mb-45 wow fadeInDown">
                                <div class="product-image">
                                    <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="Product image">
                                    <div class="hover-content">
                                        <a href="{{ route('emplois.clients.show', $emploi->id) }}"
                                            class="icon-btn">
                                            <i class="icon-briefcase"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4>
                                        <a href="{{ route('emplois.clients.show', $emploi->id) }}">
                                            {{ $emploi->titre }} | {{ $emploi->type_contrat }}
                                        </a>
                                    </h4>
                                    <div class="post-meta">
                                        <a href="#" class="post-admin">
                                            <i class="far fa-envelope"></i>
                                            {{ $emploi->contact_email }}
                                        </a> |
                                        <a href="#" class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($emploi->created_at)->format('d M Y') }}
                                        </a>
                                        <hr>
                                    </div>
                                    <span class="price"
                                        style="max-width: 100%; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $emploi->description }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const select = document.getElementById('typeContratSelect');
                select.addEventListener('change', function() {
                    const selected = this.value.toUpperCase();
                    document.querySelectorAll('.emploi-item').forEach(function(item) {
                        const type = item.dataset.typeContrat.toUpperCase();
                        if (selected === "TOUT" || selected === type) {
                            item.style.display = "";
                        } else {
                            item.style.display = "none";
                        }
                    });
                });
            });
        </script>

    </section>

@endsection
