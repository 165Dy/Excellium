@extends('layouts.admin')

@section('assistance_comptable_create')
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
                            <li class="breadcrumb-item active">Nouvelle assistance</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-add-line me-2"></i>
                        Créer une assistance comptable
                    </h4>
                    <p class="mb-0 text-muted">Enregistrez une nouvelle assistance pour une entreprise</p>
                </div>
                <div>
                    <a href="{{ route('admin.assistance_comptable.index') }}" class="btn btn-outline-secondary">
                        <i class="ri-arrow-left-line me-1"></i>
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.assistance_comptable.store') }}" method="POST" id="createAssistanceForm">
                        @csrf
                        
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
                                        name="entreprise_id" id="entrepriseSelect" required>
                                    <option value="">Sélectionner une entreprise</option>
                                    @foreach($entreprises as $entreprise)
                                        <option value="{{ $entreprise->id }}" 
                                                {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}
                                                data-assist="{{ $entreprise->assist ? '1' : '0' }}">
                                            {{ $entreprise->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('entreprise_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text" id="entrepriseHelp"></div>
                            </div>

                            <!-- Administrateur assigné -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Administrateur assigné <span class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" 
                                        name="user_id" required>
                                    <option value="">Sélectionner un administrateur</option>
                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}" 
                                                {{ old('user_id') == $admin->id ? 'selected' : '' }}>
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
                                          placeholder="Description détaillée de l'assistance..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Objectifs -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Objectifs</label>
                                <textarea class="form-control @error('objectifs') is-invalid @enderror" 
                                          name="objectifs" rows="3" 
                                          placeholder="Objectifs de l'assistance...">{{ old('objectifs') }}</textarea>
                                @error('objectifs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Type de contrat & Statut -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-file-text-line me-2"></i>
                                    Type de contrat
                                </h5>
                            </div>

                            <!-- Type de contrat -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type de contrat <span class="text-danger">*</span></label>
                                <select class="form-select @error('type_contrat') is-invalid @enderror" 
                                        name="type_contrat" required>
                                    <option value="mensuel_renouvelable" {{ old('type_contrat') == 'mensuel_renouvelable' ? 'selected' : '' }}>
                                        Mensuel renouvelable
                                    </option>
                                    <option value="factuel_objectif" {{ old('type_contrat') == 'factuel_objectif' ? 'selected' : '' }}>
                                        Factuel sur objectif
                                    </option>
                                    <option value="annuel" {{ old('type_contrat') == 'annuel' ? 'selected' : '' }}>
                                        Annuel
                                    </option>
                                    <option value="ponctuel" {{ old('type_contrat') == 'ponctuel' ? 'selected' : '' }}>
                                        Ponctuel
                                    </option>
                                </select>
                                @error('type_contrat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Fréquence de facturation -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fréquence de facturation <span class="text-danger">*</span></label>
                                <select class="form-select @error('frequence_facturation') is-invalid @enderror" 
                                        name="frequence_facturation" required>
                                    <option value="mensuelle" {{ old('frequence_facturation') == 'mensuelle' ? 'selected' : '' }}>
                                        Mensuelle
                                    </option>
                                    <option value="trimestrielle" {{ old('frequence_facturation') == 'trimestrielle' ? 'selected' : '' }}>
                                        Trimestrielle
                                    </option>
                                    <option value="fin_mission" {{ old('frequence_facturation') == 'fin_mission' ? 'selected' : '' }}>
                                        Fin de mission
                                    </option>
                                    <option value="sur_mesure" {{ old('frequence_facturation') == 'sur_mesure' ? 'selected' : '' }}>
                                        Sur mesure
                                    </option>
                                </select>
                                @error('frequence_facturation')
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
                                       value="{{ old('prix_indicatif') }}">
                                @error('prix_indicatif')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Durée estimée -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Durée estimée (jours)</label>
                                <input type="number" class="form-control @error('duree_estimee') is-invalid @enderror" 
                                       name="duree_estimee" placeholder="Ex: 30" min="1"
                                       value="{{ old('duree_estimee') }}">
                                @error('duree_estimee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date de début -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date de début</label>
                                <input type="date" class="form-control @error('date_debut') is-invalid @enderror" 
                                       name="date_debut" value="{{ old('date_debut') }}">
                                @error('date_debut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Date de fin prévue -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date de fin prévue</label>
                                <input type="date" class="form-control @error('date_fin_prevue') is-invalid @enderror" 
                                       name="date_fin_prevue" id="dateFinPrevue" value="{{ old('date_fin_prevue') }}">
                                @error('date_fin_prevue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Renouvellement automatique -->
                            <div class="col-12 mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('renouvellement_auto') is-invalid @enderror" 
                                           type="checkbox" name="renouvellement_auto" value="1" id="renouvellementAutoSwitch" 
                                           {{ old('renouvellement_auto') ? 'checked' : '' }}>
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
                                        $caracteristiques = old('caracteristiques', ['']);
                                    @endphp
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
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCaracteristique">
                                    <i class="ri-add-line me-1"></i>
                                    Ajouter une caractéristique
                                </button>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.assistance_comptable.index') }}" class="btn btn-outline-secondary">
                                        <i class="ri-arrow-left-line me-1"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i>
                                        Créer l'assistance
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

    // Vérifier si l'entreprise est déjà assistée
    $('#entrepriseSelect').on('change', function() {
        const selected = $(this).find('option:selected');
        const isAssist = selected.data('assist') == '1';
        const helpText = $('#entrepriseHelp');
        
        if (isAssist) {
            helpText.html('<i class="ri-information-line me-1"></i>Cette entreprise est déjà marquée comme assistée.')
                    .removeClass('text-danger')
                    .addClass('text-info');
        } else {
            helpText.html('<i class="ri-alert-line me-1"></i>Cette entreprise sera automatiquement marquée comme assistée.')
                    .removeClass('text-info')
                    .addClass('text-warning');
        }
    });

    // Validation des dates
    $('input[name="date_debut"]').on('change', function() {
        const dateDebut = $(this).val();
        if (dateDebut) {
            $('input[name="date_fin_prevue"]').attr('min', dateDebut);
        }
    });

    // Validation du formulaire
    $('#createAssistanceForm').on('submit', function(e) {
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

