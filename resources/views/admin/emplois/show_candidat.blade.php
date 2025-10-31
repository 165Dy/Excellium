@extends('layouts.admin')
@section('Detail_Candidature')
    <section class="page-banner pt-150 pb-80 bg-primary text-white">
        <div class="container text-center">
            <h1 class="mb-2">Détail de la Candidature</h1>
            <p>Candidature de <strong>{{ $candidature->nom }}</strong> pour le poste de
                <strong>{{ $candidature->emploi->titre ?? 'N/A' }}</strong>
            </p>
        </div>
    </section>

    <section class="user-profile-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                @php
                                    $avatars = ['1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png'];
                                    $avatarIndex = $candidature->id % count($avatars);
                                    $avatarFile = $avatars[$avatarIndex];
                                @endphp

                                <img src="{{ asset('assets_2/img/avatars/' . $avatarFile) }}" alt="Avatar"
                                    class="rounded-circle me-3" style="width:70px; height:70px;">
                                <div>
                                    @php
                                        use Carbon\Carbon;

                                        $maintenant = Carbon::now();
                                        $dateExpiration = Carbon::parse($candidature->emploi->date_expiration ?? now());

                                        if ($dateExpiration->isFuture()) {
                                            $totalHours = $maintenant->diffInHours($dateExpiration); // total d'heures restantes
                                            $joursRestants = intdiv($totalHours, 24); // nombre de jours
                                            $heuresRestantes = $totalHours % 24; // reste des heures
                                        } else {
                                            $joursRestants = 0;
                                            $heuresRestantes = 0;
                                        }
                                    @endphp




                                    <h3 class="mb-0">{{ $candidature->nom }}</h3>
                                    <small class="text-muted">{{ $candidature->email }}</small>


                                    <small class="text-muted">
                                        <strong class="badge bg-info">Temps: {{ $joursRestants }}jr(s)
                                            {{ $heuresRestantes }}H
                                        </strong>
                                    </small>


                                </div>
                            </div>
                            <div class="d-flex align-items-center badge bg-primary">
                                <a href="{{ route('admin.emplois.candidatures.index') }}" class="btn-outline-secondary">
                                    <i class="ri ri-arrow-left-line" style="color: rgb(255, 254, 254);font-size: 20px;"></i>
                                </a>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row g-4">
                                <!-- Informations Personnelles -->
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Informations Personnelles</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Téléphone :</strong>
                                                    {{ $candidature->telephone ?? 'Non fourni' }}</li>
                                                <li class="list-group-item"><strong>Date de candidature :</strong>
                                                    {{ $candidature->emploi && $candidature->emploi->date_expiration ? \Carbon\Carbon::parse($candidature->emploi->date_expiration)->format('d/m/Y H:i') : 'N/A' }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informations sur la Candidature -->
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Informations sur la Candidature</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Poste :</strong>
                                                    {{ $candidature->emploi->titre ?? 'N/A' }}</li>
                                                <li class="list-group-item"><strong>Statut :</strong>
                                                    <span
                                                        class="badge 
                                                    @if ($candidature->statut == 'accepte') bg-success 
                                                    @elseif($candidature->statut == 'refuse') bg-danger 
                                                    @else bg-warning text-dark @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Message de motivation -->
                            <div class="mt-4 card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Détails de l'Emploi</h5>

                                    <div class="mt-4 card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Détails de l'Emploi</h5>
                                            <div class="row g-3">

                                                <div class="col-md-6">
                                                    <strong>Titre :</strong> {{ $candidature->emploi->titre ?? 'N/A' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Entreprise :</strong>
                                                    {{ $candidature->emploi->entreprise ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Type de contrat :</strong>
                                                    {{ $candidature->emploi->type_contrat ?? 'N/A' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Localisation :</strong>
                                                    {{ $candidature->emploi->localisation ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Salaire :</strong>
                                                    {{ $candidature->emploi->salaire_min ?? 'N/A' }} -
                                                    {{ $candidature->emploi->salaire_max ?? 'N/A' }} €
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Nombre de postes :</strong>
                                                    {{ $candidature->emploi->nombre_postes ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Niveau d'étude :</strong>
                                                    {{ $candidature->emploi->niveau_etude ?? 'N/A' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Expérience requise :</strong>
                                                    {{ $candidature->emploi->experience_requise ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Compétences requises :</strong>
                                                    {{ $candidature->emploi->competences_requises ?? 'N/A' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Statut :</strong> {{ $candidature->emploi->statut ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Contact email :</strong>
                                                    {{ $candidature->emploi->contact_email ?? 'N/A' }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Contact téléphone :</strong>
                                                    {{ $candidature->emploi->contact_telephone ?? 'N/A' }}
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Avantages :</strong>
                                                    <p class=" badge bg-success">
                                                        {{ $candidature->emploi->avantages ?? 'N/A' }}</p>
                                                </div>

                                                <div class="col-md-6">
                                                    <strong>Date d'expiration :</strong>
                                                    <p class="badge bg-danger">
                                                        {{$candidature->emploi && $candidature->emploi->date_expiration ? \Carbon\Carbon::parse($candidature->emploi->date_expiration)->format('d/m/Y') : 'N/A' }}
                                                    </p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="card-title mt-4 mb-3">Message de Motivation</h5>
                                    <p class="bg-light p-3 rounded">{{ $candidature->message ?: 'Aucun message fourni.' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Documents -->
                            <div class="mt-4 card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Documents</h5>
                                    <div class="d-flex flex-wrap gap-2">
                                        @if ($candidature->cv_path)
                                            <a href="{{ asset('storage/' . $candidature->cv_path) }}" target="_blank" class="btn btn-danger">
                                                <i class="ri ri-file-paper-line"></i> CV
                                            </a>
                                        @else
                                            <span class="text-muted">Aucun CV fourni</span>
                                        @endif

                                        @if ($candidature->lettre_motivation)
                                            <a href="{{ asset('storage/' . $candidature->lettre_motivation) }}" target="_blank"
                                                class="btn btn-info">
                                                <i class="ri ri-file-text-line me-1"></i> Lettre de Motivation
                                            </a>
                                        @else
                                            <span class="text-muted">Aucune lettre fournie</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col-lg-10 -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section>



    <style>
        .user-profile-section .card-body h5 {
            font-weight: 600;
            color: #333;
        }

        .user-profile-section .badge {
            font-size: 0.9rem;
            padding: 0.4em 0.7em;
        }

        .user-profile-section .btn {
            min-width: 120px;
        }
    </style>
@endsection
