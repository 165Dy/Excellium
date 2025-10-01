@extends('layouts.admin')

@section('entreprises_create')
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
                                <a href="{{ route('admin.entreprises.index') }}">Entreprises</a>
                            </li>
                            <li class="breadcrumb-item active">Nouvelle entreprise</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-add-line me-2"></i>
                        Nouvelle Entreprise
                    </h4>
                    <p class="mb-0 text-muted">Ajouter une nouvelle entreprise dans le système</p>
                </div>
                <div>
                    <a href="{{ route('admin.entreprises.index') }}" class="btn btn-outline-secondary">
                        <i class="ri-arrow-left-line me-1"></i>
                        Retour à la liste
                    </a>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.entreprises.store') }}" method="POST" enctype="multipart/form-data" id="createEntrepriseForm">
                        @csrf
                        
                        <div class="row">
                            <!-- Informations de base -->
                            <div class="col-12 mb-4">
                                <h5 class="card-title">
                                    <i class="ri-information-line me-2"></i>
                                    Informations de base
                                </h5>
                            </div>

                            <!-- Nom de l'entreprise -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom de l'entreprise <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                       name="nom" placeholder="Nom de l'entreprise" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo/Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Logo de l'entreprise</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       name="image" accept="image/*">
                                <div class="form-text">Formats acceptés : JPG, PNG, GIF. Taille max : 2MB</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Activité -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Activité de l'entreprise</label>
                                <textarea class="form-control @error('activite') is-invalid @enderror" 
                                          name="activite" rows="3" placeholder="Description de l'activité principale de l'entreprise...">{{ old('activite') }}</textarea>
                                @error('activite')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Localisation -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Situation géographique</label>
                                <input type="text" class="form-control @error('situation_geographique') is-invalid @enderror" 
                                       name="situation_geographique" placeholder="Ville, région..." value="{{ old('situation_geographique') }}">
                                @error('situation_geographique')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nom du dirigeant -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom du dirigeant</label>
                                <input type="text" class="form-control @error('nom_dirigeant') is-invalid @enderror" 
                                       name="nom_dirigeant" placeholder="Nom et prénom du dirigeant" value="{{ old('nom_dirigeant') }}">
                                @error('nom_dirigeant')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Informations légales -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-file-text-line me-2"></i>
                                    Informations légales
                                </h5>
                            </div>

                            <!-- RCCM -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">RCCM</label>
                                <input type="text" class="form-control @error('rccm') is-invalid @enderror" 
                                       name="rccm" placeholder="Numéro RCCM" value="{{ old('rccm') }}">
                                @error('rccm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NCC -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">NCC</label>
                                <input type="text" class="form-control @error('ncc') is-invalid @enderror" 
                                       name="ncc" placeholder="Numéro NCC" value="{{ old('ncc') }}">
                                @error('ncc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- TDU -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">TDU</label>
                                <input type="text" class="form-control @error('tdu') is-invalid @enderror" 
                                       name="tdu" placeholder="Numéro TDU" value="{{ old('tdu') }}">
                                @error('tdu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Assistance comptable -->
                            <div class="col-12 mb-4 mt-3">
                                <h5 class="card-title">
                                    <i class="ri-settings-line me-2"></i>
                                    Paramètres
                                </h5>
                            </div>

                            <div class="col-12 mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('assist') is-invalid @enderror" 
                                           type="checkbox" name="assist" value="1" id="assistSwitch" {{ old('assist') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="assistSwitch">
                                        <strong>Entreprise assistée</strong>
                                        <small class="text-muted d-block">Marquer cette entreprise comme bénéficiant d'une assistance comptable</small>
                                    </label>
                                    @error('assist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.entreprises.index') }}" class="btn btn-outline-secondary">
                                        <i class="ri-arrow-left-line me-1"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i>
                                        Créer l'entreprise
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
    // Prévisualisation de l'image
    $('input[name="image"]').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Créer ou mettre à jour la prévisualisation
                let preview = $('#imagePreview');
                if (preview.length === 0) {
                    preview = $('<div id="imagePreview" class="mt-2"><img class="img-thumbnail" style="max-width: 150px; max-height: 150px;"></div>');
                    $('input[name="image"]').parent().append(preview);
                }
                preview.find('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Validation supplémentaire
    $('#createEntrepriseForm').on('submit', function(e) {
        const nom = $('input[name="nom"]').val().trim();
        if (nom.length < 2) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Erreur de validation',
                text: 'Le nom de l\'entreprise doit contenir au moins 2 caractères.'
            });
            return false;
        }
    });

    // Auto-formatage des champs numériques
    $('input[name="rccm"], input[name="ncc"], input[name="tdu"]').on('input', function() {
        // Supprimer les caractères non alphanumériques
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
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

.form-text {
    font-size: 0.8125rem;
    margin-top: 0.25rem;
}
</style>
@endpush
@endsection
