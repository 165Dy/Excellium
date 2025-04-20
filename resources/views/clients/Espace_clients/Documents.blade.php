@extends('layouts.master')
@section('documents')

<section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
    <div class="shape shape-one scene"><span data-depth="1"><img src="{{asset('assets/images/shape/p-1.png')}}" alt="shape"></span></div>
    <div class="shape shape-two scene"><span data-depth="2"><img src="{{asset('assets/images/shape/p-2.png')}}" alt="shape"></span></div>
    <div class="shape shape-three"><span><img src="{{asset('assets/images/shape/p-3.png')}}" alt="shape"></span></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="row">
                    <!--=== Page Banner Content ===-->
                    <div class="page-banner-content text-center text-white">
                        <h2 class="page-title">Nos Documents</h2>
                        <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore</p>
                        <ul class="breadcrumb-link text-white">
                            <li><a href="index.html">Pages</a></li>
                            <li class="active">Documentation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Page Section ======-->
<!--====== Start Services Section ======-->
<section class="services-section services-shape secondary-dark-bg pt-140 pb-110">
    <div class="shape shape-one scene"><span data-depth="2"><img src="{{asset('assets/images/shape/s3.png')}}" alt="shape"></span></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-target-2"></i>
                    </div>
                    <div class="content">
                        <h4>Website Design</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-monitor2"></i>
                    </div>
                    <div class="content">
                        <h4>Product Design</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-diamond"></i>
                    </div>
                    <div class="content">
                        <h4>Business Strategy</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-presentation"></i>
                    </div>
                    <div class="content">
                        <h4>UI/UX Design</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-briefcase"></i>
                    </div>
                    <div class="content">
                        <h4>Digital Marketing</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-optimization"></i>
                    </div>
                    <div class="content">
                        <h4>Brand Strategy</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-pencil"></i>
                    </div>
                    <div class="content">
                        <h4>Content Writing</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="iconic-box style-three mb-30 wow fadeInUp">
                    <div class="icon">
                        <i class="icon-scanner"></i>
                    </div>
                    <div class="content">
                        <h4>Cyber Security</h4>
                        <a href="#" class="read-more"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Services Section ======-->
<!--====== Start Why-choose Section ======-->


@endsection