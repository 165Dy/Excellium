@extends('layouts.admin')

@section('title', 'Gestion des Invitations')

@section('index_invitations')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="ri-mail-send-line me-2"></i>
                        Gestion des Invitations Administrateurs
                    </h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvitationModal">
                        <i class="ri-add-line me-1"></i>
                        Nouvelle Invitation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages de succès/erreur -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ri-check-line me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ri-error-warning-line me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Liste des invitations -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Liste des Invitations</h5>
                </div>
                <div class="card-body">
                    @if($invitations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover" id="invitationsTable">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Nom & Prénom</th>
                                        <th>Invité par</th>
                                        <th>Date d'envoi</th>
                                        <th>Expire le</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invitations as $invitation)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="ri-mail-line me-2 text-primary"></i>
                                                    {{ $invitation->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <strong>{{ $invitation->prenom }} {{ $invitation->nom }}</strong>
                                            </td>
                                            <td>
                                                @if($invitation->invitedBy)
                                                    {{ $invitation->invitedBy->prenom }} {{ $invitation->invitedBy->nom }}
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $invitation->created_at->format('d/m/Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($invitation->expires_at)->format('d/m/Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                @if($invitation->used_at)
                                                    <span class="badge bg-success">
                                                        <i class="ri-check-line me-1"></i>
                                                        Utilisée
                                                    </span>
                                                    <br>
                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse($invitation->used_at)->format('d/m/Y H:i') }}
                                                    </small>
                                                @elseif(\Carbon\Carbon::parse($invitation->expires_at)->isPast())
                                                    <span class="badge bg-danger">
                                                        <i class="ri-time-line me-1"></i>
                                                        Expirée
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <i class="ri-time-line me-1"></i>
                                                        En attente
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$invitation->used_at)
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                            <i class="ri-more-2-line"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @if(!\Carbon\Carbon::parse($invitation->expires_at)->isPast())
                                                                <li>
                                                                    <form action="{{ route('admin.invitations.resend', $invitation->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i class="ri-mail-send-line me-2"></i>
                                                                            Renvoyer
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <form action="{{ route('admin.invitations.revoke', $invitation->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="dropdown-item text-danger" 
                                                                            onclick="return confirm('Êtes-vous sûr de vouloir révoquer cette invitation ?')">
                                                                        <i class="ri-close-line me-2"></i>
                                                                        Révoquer
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="ri-mail-line display-4 text-muted mb-3"></i>
                            <h5 class="text-muted">Aucune invitation envoyée</h5>
                            <p class="text-muted">Commencez par envoyer votre première invitation d'administrateur.</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvitationModal">
                                <i class="ri-add-line me-1"></i>
                                Créer une invitation
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Création d'Invitation -->
<div class="modal fade" id="createInvitationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ri-mail-send-line me-2"></i>
                    Nouvelle Invitation Administrateur
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action="{{ route('admin.invitations.send') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                   id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label for="email" class="form-label">Adresse Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="ri-information-line me-1"></i>
                                Un email d'invitation sera envoyé à cette adresse avec un lien pour créer le compte administrateur.
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mt-4">
                        <i class="ri-information-line me-2"></i>
                        <strong>Information :</strong> L'invitation sera valide pendant 7 jours. 
                        Le nouvel administrateur pourra créer son compte en cliquant sur le lien reçu par email.
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="ri-close-line me-1"></i>
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-mail-send-line me-1"></i>
                        Envoyer l'Invitation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser DataTable si il y a des données
    @if($invitations->count() > 0)
        $('#invitationsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
            },
            order: [[3, 'desc']], // Trier par date d'envoi décroissante
            pageLength: 25,
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [6] } // Désactiver le tri sur la colonne Actions
            ]
        });
    @endif

    // Rouvrir le modal en cas d'erreur de validation
    @if($errors->any())
        var modal = new bootstrap.Modal(document.getElementById('createInvitationModal'));
        modal.show();
    @endif
});
</script>
@endpush
@endsection
