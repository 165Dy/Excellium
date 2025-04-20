@extends('layouts.master')
@section('Conseils_actualites')
<section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
    <div class="shape shape-one scene"><span data-depth="1"><img src="{{asset('assets/images/shape/p-1.png')}}" alt="shape"></span>
    </div>
    <div class="shape shape-two scene"><span data-depth="2"><img src="{{asset('assets/images/shape/p-2.png')}}" alt="shape"></span>
    </div>
    <div class="shape shape-three"><span><img src="{{asset('assets/images/shape/p-3.png')}}" alt="shape"></span></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="row">
                    <!--=== Page Banner Content ===-->
                    <div class="page-banner-content text-center text-white">
                        <h2 class="page-title">Conseils & Actualités</h2>
                        <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                        </p>
                        <ul class="breadcrumb-link text-white">
                            <li><a href="index.html">Pages</a></li>
                            <li class="active">Conseils & Actualités</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Page Section ======-->
@endsection