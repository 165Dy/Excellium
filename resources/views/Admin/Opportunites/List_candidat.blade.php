{{-- filepath: c:\Users\home\Desktop\Projet_Excellium\Excellium\resources\views\clients\Opportunites\List_candidat.blade.php --}}
@extends('layouts.admin')
@section('candidatures_index')

<section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="page-banner-content text-center text-white">
                    <h1 class="page-title">Liste des Candidats</h1>
                    <p>Voici tous les candidats ayant postulé à vos offres d'emploi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-section secondary-dark-bg pt-140 pb-100">
    <div class="container" style="margin-top: -100px">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-filter">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="show-text wow fadeInLeft">
                                <span>Nombre de candidats : {{ $candidats->count() }}</span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="filter-dropdown float-md-end wow fadeInRight">
                                <select class="wide" id="statutSelect">
                                    <option value="TOUT">TOUT</option>
                                    <option value="en_attente">En attente</option>
                                    <option value="accepte">Accepté</option>
                                    <option value="refuse">Refusé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($candidats->isEmpty())
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <strong>Aucun candidat trouvé.</strong>
                    </div>
                </div>
            @else
                @foreach ($candidats as $candidat)
                    <div class="col-lg-4 col-md-6 col-sm-12 candidat-item"
                        data-statut="{{ strtolower($candidat->statut) }}">
                        <div class="product-item mb-45 wow fadeInDown">
                            <div class="product-image">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar candidat">
                                <div class="hover-content">
                                    <a href="{{ route('candidatures.show', $candidat->id) }}"
                                        class="icon-btn" title="Voir le détail">
                                        <i class="icon-user"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4>
                                    <a href="{{ route('candidatures.show', $candidat->id) }}">
                                        {{ $candidat->nom }}
                                    </a>
                                </h4>
                                <div class="post-meta">
                                    <span class="post-admin">
                                        <i class="far fa-envelope"></i>
                                        {{ $candidat->email }}
                                    </span> |
                                    <span class="post-date">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($candidat->created_at)->format('d M Y') }}
                                    </span>
                                    <hr>
                                </div>
                                <span class="badge 
                                    @if($candidat->statut == 'accepte') bg-success 
                                    @elseif($candidat->statut == 'refuse') bg-danger 
                                    @else bg-warning text-dark @endif">
                                    {{ ucfirst($candidat->statut) }}
                                </span>
                                <div class="mt-2">
                                    <strong>Postulé pour :</strong>
                                    {{ $candidat->opportunite->titre ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('statutSelect');
            select.addEventListener('change', function() {
                const selected = this.value.toLowerCase();
                document.querySelectorAll('.candidat-item').forEach(function(item) {
                    const statut = item.dataset.statut.toLowerCase();
                    if (selected === "tout" || selected === statut) {
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