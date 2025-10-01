@extends('layouts.admin')

@section('assistance_comptable_edit')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.assistance_comptable.index') }}">Assistances comptables</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.assistance_comptable.show', $assistance) }}">Assistance #{{ $assistance->id }}</a>
                            </li>
                            <li class="breadcrumb-item active">Modifier</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-edit-line me-2"></i>
                        Modifier l'assistance comptable
                    </h4>
                    <p class="mb-0 text-muted">{{ $assistance->entreprise->nom }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.assistance_comptable.show', $assistance) }}" class="btn btn-outline-secondary">
                        <i class="ri-arrow-left-line me-1"></i>
                        Retour aux détails
                    </a>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.assistance_comptable.update', $assistance) }}" method="POST" id="editAssistanceForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Informations de base -->
                            <div class="col-12 mb-4">
                                <h5 class="card-title">
                                    <i class="ri-information-line me-2"></i>
                                    Informations de base
                                </h5>
                            </div>

                            <!-- Entreprise -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Entreprise <span class="text-danger">*</span></label>
                                <select class="form-select @error('entreprise_id') is-invalid @enderror" 
                                        name="entreprise_id" required>
                                    <option value="">Sélectionner une entreprise</option>
                                    @foreach($entreprises as $entreprise)
                                        <option value="{{ $entreprise->id }}" 
                                                {{ old('entreprise_id', $assistance->entreprise_id) == $entreprise->id ? 'selected' : '' }}>
                                            {{ $entreprise->nom }}
                                            @if($entreprise->assist)
                                                <span class="badge bg-success">Assistée</span>
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('entreprise_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Administrateur assigné -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Administrateur assigné <span class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" 
                                        name="user_id" required>
                                    <option value="">Sélectionner un administrateur</option>
                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}" 
                                                {{ old('user_id', $assistance->user_id) == $admin->id ? 'selected' : '' }}>
                                            {{ $admin->nom }} {{ $admin->prenoms }}
                                            ({{ $admin->type === 'super_admin' ? 'Super Admin' : 'Admin' }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          name="description" rows="4" 
                                          placeholder="Description détaillée de l'assistance..." required>{{ old('description', $assistance->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Objectifs -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Objectifs</label>
                                <textarea class="form-control @error('objectifs') is-invalid @enderror" 
                                          name="objectifs" rows="3" 
                                          placeholder="Objectifs de l'assistance...">{{ old('objectifs', $assistance->objectifs) }}</textarea>
                                @error('objectifs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Type de contrat & Statut -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-file-text-line me-2"></i>
                                    Type de contrat et statut
                                </h5>
                            </div>

                            <!-- Type de contrat -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Type de contrat <span class="text-danger">*</span></label>
                                <select class="form-select @error('type_contrat') is-invalid @enderror" 
                                        name="type_contrat" required>
                                    <option value="mensuel_renouvelable" {{ old('type_contrat', $assistance->type_contrat) == 'mensuel_renouvelable' ? 'selected' : '' }}>
                                        Mensuel renouvelable
                                    </option>
                                    <option value="factuel_objectif" {{ old('type_contrat', $assistance->type_contrat) == 'factuel_objectif' ? 'selected' : '' }}>
                                        Factuel sur objectif
                                    </option>
                                    <option value="annuel" {{ old('type_contrat', $assistance->type_contrat) == 'annuel' ? 'selected' : '' }}>
                                        Annuel
                                    </option>
                                    <option value="ponctuel" {{ old('type_contrat', $assistance->type_contrat) == 'ponctuel' ? 'selected' : '' }}>
                                        Ponctuel
                                    </option>
                                </select>
                                @error('type_contrat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Fréquence de facturation -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Fréquence de facturation <span class="text-danger">*</span></label>
                                <select class="form-select @error('frequence_facturation') is-invalid @enderror" 
                                        name="frequence_facturation" required>
                                    <option value="mensuelle" {{ old('frequence_facturation', $assistance->frequence_facturation) == 'mensuelle' ? 'selected' : '' }}>
                                        Mensuelle
                                    </option>
                                    <option value="trimestrielle" {{ old('frequence_facturation', $assistance->frequence_facturation) == 'trimestrielle' ? 'selected' : '' }}>
                                        Trimestrielle
                                    </option>
                                    <option value="fin_mission" {{ old('frequence_facturation', $assistance->frequence_facturation) == 'fin_mission' ? 'selected' : '' }}>
                                        Fin de mission
                                    </option>
                                    <option value="sur_mesure" {{ old('frequence_facturation', $assistance->frequence_facturation) == 'sur_mesure' ? 'selected' : '' }}>
                                        Sur mesure
                                    </option>
                                </select>
                                @error('frequence_facturation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Statut -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Statut <span class="text-danger">*</span></label>
                                <select class="form-select @error('statut') is-invalid @enderror" 
                                        name="statut" id="statutSelect" required>
                                    <option value="brouillon" {{ old('statut', $assistance->statut) == 'brouillon' ? 'selected' : '' }}>
                                        Brouillon
                                    </option>
                                    <option value="en_negociation" {{ old('statut', $assistance->statut) == 'en_negociation' ? 'selected' : '' }}>
                                        En négociation
                                    </option>
                                    <option value="valide" {{ old('statut', $assistance->statut) == 'valide' ? 'selected' : '' }}>
                                        Validé
                                    </option>
                                    <option value="en_cours" {{ old('statut', $assistance->statut) == 'en_cours' ? 'selected' : '' }}>
                                        En cours
                                    </option>
                                    <option value="suspendu" {{ old('statut', $assistance->statut) == 'suspendu' ? 'selected' : '' }}>
                                        Suspendu
                                    </option>
                                    <option value="termine" {{ old('statut', $assistance->statut) == 'termine' ? 'selected' : '' }}>
                                        Terminé
                                    </option>
                                    <option value="annule" {{ old('statut', $assistance->statut) == 'annule' ? 'selected' : '' }}>
                                        Annulé
                                    </option>
                                </select>
                                @error('statut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Informations financières -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-money-dollar-circle-line me-2"></i>
                                    Informations financières et planning
                                </h5>
                            </div>

                            <!-- Prix indicatif -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Prix indicatif (FCFA)</label>
                                <input type="number" class="form-control @error('prix_indicatif') is-invalid @enderror" 
                                       name="prix_indicatif" placeholder="Ex: 50000" min="0" step="0.01"
                                       value="{{ old('prix_indicatif', $assistance->prix_indicatif) }}">
                                @error('prix_indicatif')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Durée estimée -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Durée estimée (jours)</label>
                                <input type="number" class="form-control @error('duree_estimee') is-invalid @enderror" 
                                       name="duree_estimee" placeholder="Ex: 30" min="1"
                                       value="{{ old('duree_estimee', $assistance->duree_estimee) }}">
                                @error('duree_estimee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date de début -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date de début</label>
                                <input type="date" class="form-control @error('date_debut') is-invalid @enderror" 
                                       name="date_debut" 
                                       value="{{ old('date_debut', $assistance->date_debut?->format('Y-m-d')) }}">
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date de fin prévue -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date de fin prévue</label>
                                <input type="date" class="form-control @error('date_fin_prevue') is-invalid @enderror" 
                                       name="date_fin_prevue" id="dateFinPrevue"
                                       value="{{ old('date_fin_prevue', $assistance->date_fin_prevue?->format('Y-m-d')) }}">
                                @error('date_fin_prevue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date de fin réelle -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date de fin réelle</label>
                                <input type="date" class="form-control @error('date_fin_reelle') is-invalid @enderror" 
                                       name="date_fin_reelle" id="dateFinReelle"
                                       value="{{ old('date_fin_reelle', $assistance->date_fin_reelle?->format('Y-m-d')) }}">
                                @error('date_fin_reelle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Prochaine échéance -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Prochaine échéance</label>
                                <input type="date" class="form-control @error('prochaine_echeance') is-invalid @enderror" 
                                       name="prochaine_echeance"
                                       value="{{ old('prochaine_echeance', $assistance->prochaine_echeance?->format('Y-m-d')) }}">
                                @error('prochaine_echeance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Renouvellement automatique -->
                            <div class="col-12 mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('renouvellement_auto') is-invalid @enderror" 
                                           type="checkbox" name="renouvellement_auto" value="1" id="renouvellementAutoSwitch" 
                                           {{ old('renouvellement_auto', $assistance->renouvellement_auto) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="renouvellementAutoSwitch">
                                        <strong>Renouvellement automatique</strong>
                                        <small class="text-muted d-block">Activer le renouvellement automatique du contrat</small>
                                    </label>
                                    @error('renouvellement_auto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Caractéristiques -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-list-check me-2"></i>
                                    Caractéristiques
                                </h5>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Caractéristiques de l'assistance</label>
                                <div id="caracteristiquesContainer">
                                    @php
                                        $caracteristiques = old('caracteristiques', $assistance->caracteristiques ?? []);
                                    @endphp
                                    @if(is_array($caracteristiques) && count($caracteristiques) > 0)
                                        @foreach($caracteristiques as $index => $caract)
                                            <div class="input-group mb-2 caracteristique-item">
                                                <input type="text" class="form-control" 
                                                       name="caracteristiques[]" 
                                                       placeholder="Ex: Tenue de la comptabilité générale"
                                                       value="{{ $caract }}">
                                                <button type="button" class="btn btn-outline-danger remove-caracteristique">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 caracteristique-item">
                                            <input type="text" class="form-control" 
                                                   name="caracteristiques[]" 
                                                   placeholder="Ex: Tenue de la comptabilité générale">
                                            <button type="button" class="btn btn-outline-danger remove-caracteristique">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCaracteristique">
                                    <i class="ri-add-line me-1"></i>
                                    Ajouter une caractéristique
                                </button>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.assistance_comptable.show', $assistance) }}" class="btn btn-outline-secondary">
                                        <i class="ri-arrow-left-line me-1"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i>
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Gestion des caractéristiques
    $('#addCaracteristique').on('click', function() {
        const newItem = `
            <div class="input-group mb-2 caracteristique-item">
                <input type="text" class="form-control" 
                       name="caracteristiques[]" 
                       placeholder="Ex: Tenue de la comptabilité générale">
                <button type="button" class="btn btn-outline-danger remove-caracteristique">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </div>
        `;
        $('#caracteristiquesContainer').append(newItem);
    });

    // Supprimer une caractéristique
    $(document).on('click', '.remove-caracteristique', function() {
        if ($('.caracteristique-item').length > 1) {
            $(this).closest('.caracteristique-item').remove();
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Attention',
                text: 'Au moins une caractéristique est requise.'
            });
        }
    });

    // Validation des dates
    $('input[name="date_debut"]').on('change', function() {
        const dateDebut = $(this).val();
        if (dateDebut) {
            $('input[name="date_fin_prevue"]').attr('min', dateDebut);
        }
    });

    // Activer date_fin_reelle uniquement si statut = terminé
    $('#statutSelect').on('change', function() {
        const statut = $(this).val();
        const dateFinReelleField = $('#dateFinReelle');
        
        if (statut === 'termine' || statut === 'annule') {
            dateFinReelleField.prop('disabled', false);
            if (!dateFinReelleField.val()) {
                dateFinReelleField.val(new Date().toISOString().split('T')[0]);
            }
        } else {
            dateFinReelleField.prop('disabled', true);
        }
    }).trigger('change');

    // Validation du formulaire
    $('#editAssistanceForm').on('submit', function(e) {
        const description = $('textarea[name="description"]').val().trim();
        if (description.length < 10) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Erreur de validation',
                text: 'La description doit contenir au moins 10 caractères.'
            });
            return false;
        }

        // Vérifier qu'au moins une caractéristique non vide existe
        const caracteristiques = $('input[name="caracteristiques[]"]').filter(function() {
            return $(this).val().trim() !== '';
        });

        if (caracteristiques.length === 0) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Erreur de validation',
                text: 'Au moins une caractéristique est requise.'
            });
            return false;
        }
    });

    // Avertissement lors du changement de statut
    $('#statutSelect').on('change', function() {
        const nouveauStatut = $(this).val();
        const ancienStatut = '{{ $assistance->statut }}';
        
        if ((ancienStatut === 'en_cours' || ancienStatut === 'valide') && 
            (nouveauStatut === 'termine' || nouveauStatut === 'annule')) {
            Swal.fire({
                title: 'Attention !',
                text: 'Vous êtes sur le point de clôturer cette assistance. Cette action affectera le statut de l\'entreprise.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Continuer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (!result.isConfirmed) {
                    $(this).val(ancienStatut);
                }
            });
        }
    });
});
</script>
@endpush

@push('styles')
<style>
.breadcrumb-style1 {
    background: none;
    padding: 0;
    margin-bottom: 0.5rem;
}

.breadcrumb-style1 .breadcrumb-item + .breadcrumb-item::before {
    content: '/';
    color: #8592a3;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-control:focus,
.form-select:focus {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.25);
}

.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: block;
}

.card-title {
    color: #5a6169;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #e7eef7;
}

.form-switch .form-check-input {
    width: 2.5rem;
    height: 1.25rem;
}

.caracteristique-item {
    animation: fadeIn 0.3s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.input-group .btn {
    border-left: 0;
}

.input-group .form-control:focus + .btn {
    border-color: #8b5cf6;
}
</style>
@endpush
@endsection

