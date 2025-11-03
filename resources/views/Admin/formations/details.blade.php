@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- En-tête de la page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold">
                <i class="ri-book-open-line me-2"></i>
                Détails de la Formation
            </h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $formation->titre }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="ri-arrow-left-line me-1"></i>
                Retour
            </a>
        </div>
    </div>

    <!-- Informations de la formation -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-information-line me-2"></i>
                Informations Générales
            </h5>
            <button type="button" class="btn btn-sm btn-primary" onclick="editFormation({{ $formation->id }})">
                <i class="ri-edit-line me-1"></i>
                Modifier
            </button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>Titre:</strong>
                    <p class="mb-0">{{ $formation->titre }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Catégorie:</strong>
                    <p class="mb-0">
                        <span class="badge bg-primary">{{ $formation->categorie->nom ?? 'N/A' }}</span>
                    </p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Coût:</strong>
                    <p class="mb-0">{{ number_format($formation->cout, 0, ',', ' ') }} FCFA</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Lieu:</strong>
                    <p class="mb-0">{{ $formation->lieu ?? 'Non spécifié' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Date de début:</strong>
                    <p class="mb-0">{{ $formation->date_debut ? \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y H:i') : 'Non définie' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Date de fin:</strong>
                    <p class="mb-0">{{ $formation->date_fin ? \Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y H:i') : 'Non définie' }}</p>
                </div>
                @if($formation->programme)
                <div class="col-12 mb-3">
                    <strong>Programme:</strong>
                    <p class="mb-0">{{ $formation->programme }}</p>
                </div>
                @endif
                @if($formation->prerequis)
                <div class="col-12 mb-3">
                    <strong>Prérequis:</strong>
                    <p class="mb-0">{{ $formation->prerequis }}</p>
                </div>
                @endif
                @if($formation->bonus)
                <div class="col-12 mb-3">
                    <strong>Bonus:</strong>
                    <p class="mb-0">{{ $formation->bonus }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modules de la formation -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-book-2-line me-2"></i>
                Modules ({{ $formation->modules->count() }})
            </h5>
            <button type="button" class="btn btn-sm btn-success" onclick="detailOpenAddModuleModal({{ $formation->id }})">
                <i class="ri-add-line me-1"></i>
                Ajouter un module
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="modules-tbody">
                        @forelse($formation->modules as $index => $module)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $module->titre }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($module->description, 50) }}</td>
                            <td>{{ $module->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="detailEditModule({{ $module->id }})">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="detailDeleteModule({{ $module->id }})">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Aucun module pour cette formation
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Documents de la formation -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-file-text-line me-2"></i>
                Documents ({{ $formation->documents->count() }})
            </h5>
            <button type="button" class="btn btn-sm btn-success" onclick="detailOpenAddDocumentModal({{ $formation->id }})">
                <i class="ri-add-line me-1"></i>
                Ajouter un document
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Fichier</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="documents-tbody">
                        @forelse($formation->documents as $index => $document)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $document->titre }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($document->description, 50) }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $document->fichier) }}" target="_blank" class="text-primary">
                                    <i class="ri-file-download-line"></i> Télécharger
                                </a>
                            </td>
                            <td>{{ $document->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="detailEditDocument({{ $document->id }})">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="detailDeleteDocument({{ $document->id }})">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Aucun document pour cette formation
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Inscriptions à la formation -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="ri-user-line me-2"></i>
                Inscriptions ({{ $formation->inscriptions->count() }})
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Statut</th>
                            <th>Date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($formation->inscriptions as $index => $inscription)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $inscription->nom }}</td>
                            <td>{{ $inscription->prenom }}</td>
                            <td>{{ $inscription->email }}</td>
                            <td>{{ $inscription->telephone ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ optional($inscription)->statut === 'confirme' ? 'success' : (optional($inscription)->statut === 'refuse' ? 'danger' : 'warning') }}">
                                    {{ ucfirst(optional($inscription)->statut ?? 'en_attente') }}
                                </span>
                            </td>
                            <td>{{ $inscription->created_at ? \Carbon\Carbon::parse($inscription->created_at)->format('d/m/Y H:i') : 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Aucune inscription pour cette formation
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajouter/Modifier Module -->
<div class="modal fade" id="detailModuleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModuleModalTitle">Ajouter un module</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="detailModuleForm">
                @csrf
                <input type="hidden" id="detail_module_id" name="module_id">
                <input type="hidden" id="detail_module_formation_id" name="formation_id" value="{{ $formation->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_module_titre" class="form-label">Titre du module *</label>
                        <input type="text" class="form-control" id="detail_module_titre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail_module_description" class="form-label">Description</label>
                        <textarea class="form-control" id="detail_module_description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ajouter/Modifier Document -->
<div class="modal fade" id="detailDocumentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailDocumentModalTitle">Ajouter un document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="detailDocumentForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="detail_document_id" name="document_id">
                <input type="hidden" id="detail_document_formation_id" name="formation_id" value="{{ $formation->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_document_titre" class="form-label">Titre du document</label>
                        <input type="text" class="form-control" id="detail_document_titre" name="titre">
                    </div>
                    <div class="mb-3">
                        <label for="detail_document_description" class="form-label">Description</label>
                        <textarea class="form-control" id="detail_document_description" name="description" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detail_document_fichier" class="form-label">Fichier *</label>
                        <input type="file" class="form-control" id="detail_document_fichier" name="fichier" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar">
                        <small class="text-muted">Formats acceptés: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP, RAR (Max: 50MB)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const formationId = {{ $formation->id }};

    // ===== GESTION DES MODULES (PAGE DÉTAILS) =====
    function detailOpenAddModuleModal(formationId) {
        console.log('🔵 [DÉTAILS] Ouverture modal MODULE pour formation:', formationId);
        document.getElementById('detailModuleForm').reset();
        document.getElementById('detail_module_id').value = '';
        document.getElementById('detail_module_formation_id').value = formationId;
        document.getElementById('detailModuleModalTitle').textContent = 'Ajouter un module';
        
        const modal = new bootstrap.Modal(document.getElementById('detailModuleModal'));
        modal.show();
    }

    function detailEditModule(moduleId) {
        console.log('🔧 [DÉTAILS] Édition module:', moduleId);
        
        fetch(`/admin/formations/modules/${moduleId}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('detail_module_id').value = data.module.id;
                    document.getElementById('detail_module_titre').value = data.module.titre;
                    document.getElementById('detail_module_description').value = data.module.description || '';
                    document.getElementById('detailModuleModalTitle').textContent = 'Modifier le module';
                    
                    const modal = new bootstrap.Modal(document.getElementById('detailModuleModal'));
                    modal.show();
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                Swal.fire('Erreur', 'Impossible de charger le module', 'error');
            });
    }

    function detailDeleteModule(moduleId) {
        console.log('🗑️ [DÉTAILS] Suppression module:', moduleId);
        Swal.fire({
            title: 'Supprimer ce module ?',
            text: "Cette action est irréversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/formations/modules/${moduleId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Supprimé !', data.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('Erreur', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    Swal.fire('Erreur', 'Une erreur est survenue', 'error');
                });
            }
        });
    }

    document.getElementById('detailModuleForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        console.log('🚀 DÉBUT SOUMISSION FORMULAIRE MODULE DÉTAILS');
        
        const formData = new FormData(this);
        const moduleId = document.getElementById('detail_module_id').value;
        
        const url = moduleId 
            ? `/admin/formations/modules/${moduleId}`
            : `/admin/formations/${formationId}/modules`;
        
        const method = moduleId ? 'PUT' : 'POST';
        
        console.log('📤 Envoi module vers:', url, 'Méthode:', method);
        console.log('📦 FormData:', Object.fromEntries(formData));
        
        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(res => {
            console.log('📥 Réponse reçue MODULE, status:', res.status);
            return res.json();
        })
        .then(data => {
            console.log('📊 Données MODULE reçues:', data);
            if (data.success) {
                Swal.fire('Succès !', data.message, 'success');
                bootstrap.Modal.getInstance(document.getElementById('detailModuleModal')).hide();
                location.reload();
            } else {
                Swal.fire('Erreur', data.message, 'error');
            }
        })
        .catch(error => {
            console.error('❌ ERREUR MODULE:', error);
            Swal.fire('Erreur', 'Une erreur est survenue', 'error');
        });
    });

    // ===== GESTION DES DOCUMENTS (PAGE DÉTAILS) =====
    function detailOpenAddDocumentModal(formationId) {
        console.log('🔵 [DÉTAILS] Ouverture modal DOCUMENT pour formation:', formationId);
        document.getElementById('detailDocumentForm').reset();
        document.getElementById('detail_document_id').value = '';
        document.getElementById('detail_document_formation_id').value = formationId;
        document.getElementById('detailDocumentModalTitle').textContent = 'Ajouter un document';
        
        const modal = new bootstrap.Modal(document.getElementById('detailDocumentModal'));
        modal.show();
    }

    function detailEditDocument(documentId) {
        console.log('🔧 [DÉTAILS] Édition document:', documentId);
        
        fetch(`/admin/formations/documents/${documentId}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('detail_document_id').value = data.document.id;
                    document.getElementById('detail_document_titre').value = data.document.titre || '';
                    document.getElementById('detail_document_description').value = data.document.description || '';
                    document.getElementById('detailDocumentModalTitle').textContent = 'Modifier le document';
                    
                    const modal = new bootstrap.Modal(document.getElementById('detailDocumentModal'));
                    modal.show();
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                Swal.fire('Erreur', 'Impossible de charger le document', 'error');
            });
    }

    function detailDeleteDocument(documentId) {
        console.log('🗑️ [DÉTAILS] Suppression document:', documentId);
        Swal.fire({
            title: 'Supprimer ce document ?',
            text: "Cette action est irréversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/formations/documents/${documentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Supprimé !', data.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('Erreur', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    Swal.fire('Erreur', 'Une erreur est survenue', 'error');
                });
            }
        });
    }

    document.getElementById('detailDocumentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        console.log('🚀 DÉBUT SOUMISSION FORMULAIRE DÉTAILS');
        
        const formData = new FormData(this);
        const documentId = document.getElementById('detail_document_id').value;
        
        const url = documentId 
            ? `/admin/formations/documents/${documentId}`
            : `/admin/formations/${formationId}/documents`;
        
        console.log('📤 Envoi document vers:', url);
        console.log('📦 FormData entries:');
        for (let pair of formData.entries()) {
            console.log('  -', pair[0], ':', pair[1]);
        }
        
        if (documentId) {
            formData.append('_method', 'PUT');
        }
        
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => {
            console.log('📥 Réponse reçue, status:', res.status);
            return res.json();
        })
        .then(data => {
            console.log('📊 Données reçues:', data);
            if (data.success) {
                Swal.fire('Succès !', data.message, 'success');
                bootstrap.Modal.getInstance(document.getElementById('detailDocumentModal')).hide();
                location.reload();
            } else {
                let errorMsg = data.message;
                if (data.errors) {
                    errorMsg += '\n\n' + Object.values(data.errors).flat().join('\n');
                }
                Swal.fire('Erreur', errorMsg, 'error');
            }
        })
        .catch(error => {
            console.error('❌ ERREUR:', error);
            Swal.fire('Erreur', 'Une erreur est survenue', 'error');
        });
    });
</script>
@endsection

