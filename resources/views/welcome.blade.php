@extends('layouts.master')
@section('welcome')
    <!--====== Start Header Section ======-->
    <section class="hero-section">
        <div class="hero-wrapper-two bg_cover" style="background-image: url(assets/images/hero/hero-bg-1.png);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="hero-content mb-50 wow fadeInLeft">
                            <h2>Excellium Conseils</h2>
                            <p>
                                Bienvenue chez Excellium Conseils, votre partenaire stratégique
                                en gestion financière et comptable. Nous accompagnons les entrepreneurs,
                                les entreprises et les professionnels dans l’optimisation de leurs finances
                                grâce à des solutions sur mesure. Notre mission : vous aider à prendre les
                                meilleures décisions pour assurer la croissance et la pérennité de votre activité.
                            </p>
                            <form class="newsletter-form mb-60">
                                <div class="form-group">
                                    <label><i class="far fa-envelope" aria-hidden="true"></i></label>
                                    <input type="email" placeholder="Enter mail address" name="email">
                                    <button class="theme-btn style-one">Inscrivez-vous</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="hero-image mb-50 wow fadeInRight">
                            <img src="assets/images/excellium_photo_3.jfif" alt="Hero Image"
                                style="border-radius:10px 10px ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center mb-60 wow fadeInDown">

                        <h2>Pourquoi choisir Excellium Conseils ?</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="section-content-box mb-50 wow fadeInLeft">
                        <p class="mb-30">Chez Excellium Conseils, nous mettons tout en œuvre pour vous offrir un
                            accompagnement de qualité, adapté à vos besoins spécifiques. Voici 6 raisons de nous faire
                            confiance :</p>
                        <div class="section-nav-tab mb-30">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#mission">Our
                                        Mission</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vision">Our
                                        Vision</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mission">
                                <div class="content-box">
                                    <p class="mb-20">lorem voluptatem accusantium doloremque laudantium totamua rem
                                        aperiam eaque ipsa quae abuz</p>
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Your success is our priority</li>
                                        <li><i class="far fa-check"></i>Leading the way bright future</li>
                                    </ul>
                                    <a href="#" class="theme-btn style-one">Know More About Us</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vision">
                                <div class="content-box">
                                    <p class="mb-20">aperiam voluptatem accusantium doloremque lorem totamua rem
                                        aperiam eaque ipsa quae abuz</p>
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Your success is our priority</li>
                                        <li><i class="far fa-check"></i>Leading the way bright future</li>
                                    </ul>
                                    <a href="#" class="theme-btn style-one">Know More About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="choose-image mb-50 wow fadeInRight">
                        <img src="assets/images/excellium_photo_1.jfif" alt="choose image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Start Why-choose Section ======-->
    {{-- <section class="why-choose-us pt-130 pb-90">
       
    </section><!--====== End Why-choose Section ======--> --}}
    <!--====== Start Slider text Section ======-->
    <section class="headline-text primary-bg pt-55 pb-55">
        <div class="animate-text">

            <span class="text" style="color: white">Contact Us</span>
            <span class="text" style="color: white">Let’s Talk</span>
            <span class="text"></span>
            <span class="text" style="color: white">Let’s Talk</span>
            <span class="text"style="color: white">Contact Us</span>
            <span class="text"style="color: white">Let’s Talk</span>
            <span class="text"style="color: white">Contact Us</span>
            <span class="text"style="color: white">Let’s Talk</span>
            <span class="text"style="color: white">Contact Us</span>
        </div>
    </section><!--====== End Slider text Section ======-->
    <!--====== Start Case Section ======-->
    <section class="case-section pt-130 pb-110" style="margin-bottom:-100px">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:-100px;">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50 wow fadeInDown">
                        <h2>Nos Services</h2>
                    </div>
                </div>
            </div>
            <div class="zency-isotope wow fadeInDown">
                <div class="row isotope-masonry-grid">
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/compta.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="#">Tenue de comptabilité, déclarations fiscales et
                                                    optimisation fiscale.</a></span>
                                            <h4 class="title"><a href="case-details.html">Assistance comptable et fiscale
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/img_1.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="#">Analyse financière, gestion des risques et amélioration
                                                    des performances.</a></span>
                                            <h4 class="title"><a href="case-details.html">Audit et conseil</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/recru.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="#">Mise en relation avec des talents qualifiés pour
                                                    renforcer vos équipes.</a></span>
                                            <h4 class="title"><a href="case-details.html">Recrutement et placement</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/paie.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="#"> Externalisation de la gestion salariale pour garantir
                                                    conformité et efficacité.</a></span>
                                            <h4 class="title"><a href="case-details.html">Gestion de la paie</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/finance.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="#">Accompagnement dans l’obtention de crédits et
                                                    subventions.</a></span>
                                            <h4 class="title"><a href="case-details.html">Recherche de financement </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Case Section ======-->
    <!--====== Start Testimonial Section ======-->
    <section class="testimonial-section secondary-dark-bg pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="seciton-content-box mb-40 wow fadeInLeft">
                        <div class="section-title mb-20">
                            <span class="sub-title">Témoignages</span>
                            <h2>Nos clients parlent de nous ! </h2>
                        </div>
                        <p>
                            Découvrez les retours d’expérience de ceux
                            qui nous font confiance et comment Excellium Conseils
                            les a aidés à optimiser leur gestion financière et à atteindre leurs objectifs.
                        </p>
                        <div class="testimonial-arrows mt-50"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-slider-one wow fadeInRight">
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>“There’re many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words.”</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-1.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>“There’re many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words.”</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-2.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>“There’re many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words.”</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-2.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Testimonial Section ======-->
    <!--====== Start Case Section ======-->
    <section class="blog-section secondary-dark-bg pt-140 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="section-title mb-60 wow fadeInDown">
                        <span class="sub-title">Blog & News</span>
                        <h2>Latest From Blogs</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog-post-item style-two mb-30 wow fadeInDown">
                                <div class="post-thumbnail">
                                    <img src="assets/images/blog/blog-4.jpg" alt="Post Image">
                                    <ul class="post-categories">
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#" class="post-admin"><i class="far fa-user-alt"></i>By
                                            Admin</a>
                                        <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>25 Sep
                                            2023</a>
                                    </div>
                                    <h4 class="title"><a href="blog-details.html">Creative Solutions Deliver Profits
                                            to You</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-post-item style-two mb-30 wow fadeInDown">
                                <div class="post-thumbnail">
                                    <img src="assets/images/blog/blog-5.jpg" alt="Post Image">
                                    <ul class="post-categories">
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#" class="post-admin"><i class="far fa-user-alt"></i>By
                                            Admin</a>
                                        <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>25 Sep
                                            2023</a>
                                    </div>
                                    <h4 class="title"><a href="blog-details.html">Let the Wave of Clients Splash
                                            You</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="contact-banner wow fadeInRight" style="background-color:#FFD22F ">
                        <div class="banner-content">
                            <h3>Have Any Project In Your Mind?</h3>
                            <div class="icon">
                                <img src="assets/images/blog/icon.png" alt="">
                                <h4>Call For Consultation</h4>
                            </div>
                            <a href="#" class="theme-btn style-one" style="color:white ">Let’s Contact with Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Blog Section ======-->

    <!-- Modal d'inscription étape 2 -->
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="inscriptionForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inscriptionModalLabel" style="color: black">Complétez votre
                            inscription</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="email" id="modal_email">
                        <div class="mb-3">
                            <label for="nom" class="form-label" style="color: black">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label" style="color: black">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                placeholder="Votre prénom" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label" style="color: black">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                placeholder="exp: 0749095585" maxlength="10" pattern="\d{10}" required>
                            <div id="tel-error" style="color:red; display:none;">
                                <p style="font-size: 13px">
                                    Le numéro doit contenir exactement 10 chiffres.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Valider mon
                            inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation succès -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#498830"
                            d="M4 12a8 8 0 1 1 16 0a8 8 0 0 1-16 0m8-10C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5.457 7.457l-1.414-1.414L11 13.086l-2.793-2.793l-1.414 1.414L11 15.914z" />
                    </svg><br>
                    <h5 style="color: black">Compte créé avec succès !</h5>
                    <br>
                    <button type="button" id="successRedirect" class="btn btn-success mt-3"
                        data-bs-dismiss="modal">Choisir un service</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'alerte email requis -->Le numéro doit contenir exactement 10
                                chiffres.
    <div class="modal fade" id="alertEmailModal" tabindex="-1" aria-labelledby="alertEmailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#df291c"
                            d="M4 20v-6a8 8 0 1 1 16 0v6h1v2H3v-2zm2 0h12v-6a6 6 0 0 0-12 0zm5-18h2v3h-2zm8.778 2.808l1.414 1.414l-2.12 2.121l-1.415-1.414zM2.808 6.222l1.414-1.414l2.121 2.12L4.93 8.344zM7 14a5 5 0 0 1 5-5v2a3 3 0 0 0-3 3z" />
                    </svg><br>
                    <h5 style="color:black">Veuillez entrer une adresse email valide avant de
                        continuer</h5>
                    {{-- <h5 id="alertEmailModalLabel">Veuillez entrer une adresse email valide avant de
                        continuer.</h5> --}}

                    <button type="button" class="btn btn-warning mt-3" data-bs-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour la création du compte et la confirmation du succès -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intercepte le submit de la newsletter
            document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.email.value.trim();
                // Vérification simple de l'email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email || !emailRegex.test(email)) {
                    var alertModal = new bootstrap.Modal(document.getElementById('alertEmailModal'));
                    alertModal.show();
                    return;
                }
                // On place l'email dans la modale et l'affiche
                document.getElementById('modal_email').value = email;
                var modal = new bootstrap.Modal(document.getElementById('inscriptionModal'));
                modal.show();
            });

            // Soumission du formulaire de la modale
            document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch('{{ route('inscription.ajax') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Ferme modale inscription, ouvre succès
                            bootstrap.Modal.getInstance(document.getElementById('inscriptionModal'))
                                .hide();
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'successModal'));
                            modalSuccess.show();

                            // Redirige après clic
                            document.getElementById('successRedirect').onclick = function() {
                                window.location.href = "{{ route('service.choix') }}";
                            };
                        } else {
                            alert(data.message || "Erreur inconnue");
                        }
                    })
                    .catch(() => alert("Erreur serveur, veuillez réessayer."));
            });
        });

        // ...existing code...
        // Validation en temps réel du téléphone
        const telInput = document.getElementById('telephone');
        const telError = document.getElementById('tel-error');

        telInput.addEventListener('input', function() {
            // Retire tout sauf les chiffres
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length !== 10) {
                telError.style.display = 'block';
            } else {
                telError.style.display = 'none';
            }
        });

        // Empêche la soumission si le numéro n'est pas valide
        document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
            if (telInput.value.length !== 10) {
                telError.style.display = 'block';
                telInput.focus();
                e.preventDefault();
                return false;
            }
        });
        // ...existing code...
    </script>
@endsection
