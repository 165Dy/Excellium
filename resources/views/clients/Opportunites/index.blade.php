@extends('layouts.master')
@section('indexOpportunite')

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
                            <h1 class="page-title">Opportunités</h1>
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
                                    <span>Showing 1–9 of 10 results</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="filter-dropdown float-md-end wow fadeInRight">
                                    <select class="wide">
                                        <option data-display="Default Shorting">Default Shorting</option>
                                        <option value="01">Best Products</option>
                                        <option value="02">Highest Price</option>
                                        <option value="03">Lowest Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($opportunites->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <strong>Aucune opportunité trouvée.</strong>
                        </div>
                    </div>
                @else
                     @foreach ($opportunites as $opportunite)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <!--=== Product Item ===-->
                                <div class="product-item mb-45 wow fadeInDown">
                                    <div class="product-image">
                                        <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="Product image">
                                        <div class="hover-content">
                                            <a href="#" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                            <a href="#" class="icon-btn"><i class="far fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4><a href="{{ route('opportunites.clients.show', $opportunite->id) }}">
                                            {{ $opportunite->title }}</a></h4>
                                        <span class="price">{{ $opportunite->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif


            </div>
        </div>
    </section>

@endsection
