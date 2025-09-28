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
                            <p>
                                Découvrez les meilleures opportunités professionnelles adaptées à votre profil.
                                Que vous soyez débutant ou expérimenté, trouvez un emploi qui correspond à vos compétences
                                et à vos ambitions. Rejoignez dès aujourd’hui un réseau dynamique et donnez un nouvel élan à
                                votre carrière.
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
                    <div class="card bg-dark border-secondary">
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchInput" class="form-label text-white me-2 mb-0">Disponible</label>
                                    <input type="text" value="{{ $emplois->count() }}" class="form-control" disabled>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchInput" class="form-label text-white me-2 mb-0">Rechercher</label>
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="🔍........Recherche........🔍">
                                </div>

                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="statusFilter" class="form-label text-white me-2 mb-0">Statut</label>
                                    <select id="statusFilter" class="form-select">
                                        <option value="">Tous les statuts</option>
                                        <option value="CDI">CDI</option>
                                        <option value="CDD">CDD</option>
                                        <option value="STAGE">Stage</option>
                                        <option value="FREELANCE">Freelance</option>
                                        <option value="ALTERNANCE">Alternance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>


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
                                    <img src="{{ asset('assets/images/emploi.jpeg') }}" alt="Product image">
                                    <div class="hover-content">
                                        <a href="{{ route('clients.emplois.show', $emploi->id) }}" class="icon-btn">
                                            <i class="icon-briefcase"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4>
                                        <a href="{{ route('clients.emplois.show', $emploi->id) }}">
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
                const searchInput = document.getElementById('searchInput');
                const statusFilter = document.getElementById('statusFilter');
                const emploiItems = document.querySelectorAll('.emploi-item');

                function filterEmplois() {
                    const searchValue = searchInput.value.toLowerCase().trim();
                    const statusValue = statusFilter.value.trim().toUpperCase();

                    emploiItems.forEach(item => {
                        const title = item.querySelector('h4 a').textContent.toLowerCase();
                        const description = item.querySelector('.price').textContent.toLowerCase();
                        const typeContrat = item.getAttribute('data-type-contrat').toUpperCase();

                        // Vérifie si le texte de recherche est présent et si le type de contrat correspond
                        const matchesSearch = title.includes(searchValue) || description.includes(searchValue);
                        const matchesStatus = statusValue === "" || typeContrat === statusValue;

                        if (matchesSearch && matchesStatus) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    });
                }

                // Événements pour filtrage instantané
                searchInput.addEventListener('input', filterEmplois);
                statusFilter.addEventListener('change', filterEmplois);
            });
        </script>

    </section>

@endsection
