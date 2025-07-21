@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Gestion des Services</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAjoutService">
                        <i class="fas fa-plus me-2"></i>Ajouter un service
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableServices" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajout Service -->
<div class="modal fade" id="modalAjoutService" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formAjoutService">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Ajouter un service
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom du service *</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug *</label>
                                <input type="text" class="form-control" name="slug" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categorie_id" class="form-label">Catégorie *</label>
                                <select class="form-control" name="categorie_id" required>
                                    <option value="">Sélectionnez une catégorie</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialisation de la DataTable pour les services
    var table = $('#tableServices').DataTable({
        ajax: {
            url: '/admin/services/list',
            type: 'GET'
        },
        columns: [
            { data: 'nom' },
            { data: 'description' },
            { data: 'categorie' },
            { 
                data: 'actions',
                orderable: false,
                searchable: false
            }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
        }
    });

    // Charger les catégories pour le formulaire
    fetchCategories();

    // Gestion du formulaire d'ajout
    $('#formAjoutService').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('/admin/services', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès !',
                    text: data.message
                });
                $('#modalAjoutService').modal('hide');
                table.ajax.reload();
                this.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur !',
                    text: data.message
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Erreur !',
                text: 'Une erreur est survenue'
            });
        });
    });

    // Gestion des actions (modifier/supprimer)
    $('#tableServices').on('click', '.btn-edit-service', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        openEditServiceModal(id);
    });

    $('#tableServices').on('click', '.btn-delete-service', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        deleteService(id);
    });
});

// Fonction pour charger les catégories
function fetchCategories() {
    fetch('/admin/categories/list')
        .then(res => res.json())
        .then(categories => {
            const select = document.querySelector('select[name="categorie_id"]');
            select.innerHTML = '<option value="">Sélectionnez une catégorie</option>';
            categories.forEach(cat => {
                select.innerHTML += `<option value="${cat.id}">${cat.nom}</option>`;
            });
        });
}

// Fonction pour ouvrir la modale d'édition
window.openEditServiceModal = function(id) {
    fetch(`/admin/services/${id}`)
        .then(res => res.json())
        .then(service => {
            Swal.fire({
                title: `
                    <div style="display:flex;align-items:center;gap:10px;">
                        <i class="bi bi-pencil-square" style="font-size:1.8em;color:#6C63FF;"></i>
                        <span style="font-size:1.3em;font-weight:600;">Modifier le service</span>
                    </div>`,
                html: `
                <div style="background: #eff2f7; border-radius: 18px; box-shadow: 0 4px 14px rgba(41,63,87,0.06); padding: 25px 18px;">
                  <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:baseline;">
                    <div>
                      <label for="swal-nom" style="font-weight:500;letter-spacing:0.5px;color:#5a5a5a;"><i class="bi bi-cube"></i> Nom du service <span style="color:#e74c3c;">*</span></label>
                      <input id="swal-nom" class="swal2-input" style="width:100%;margin-bottom:0.5em;" placeholder="Nom" value="${escapeHtml(service.nom)}">
                    </div>
                    <div>
                      <label for="swal-description" style="font-weight:500;letter-spacing:0.5px;color:#5a5a5a;"><i class="bi bi-text-left"></i> Description</label>
                      <input id="swal-description" class="swal2-input" style="width:100%;margin-bottom:0.5em;" placeholder="Description" value="${escapeHtml(service.description || '')}">
                    </div>
                  </div>
                  <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;align-items:baseline;">
                    <div>
                      <label for="swal-slug" style="font-weight:500;letter-spacing:0.5px;color:#5a5a5a;"><i class="bi bi-link"></i> Slug <span style="color:#e74c3c;">*</span></label>
                      <input id="swal-slug" class="swal2-input" style="width:100%;margin-bottom:0.5em;" placeholder="Slug" value="${escapeHtml(service.slug)}">
                    </div>
                    <div>
                      <label for="swal-categorie" style="font-weight:500;letter-spacing:0.5px;color:#5a5a5a;"><i class="bi bi-collection"></i> Catégorie <span style="color:#e74c3c;">*</span></label>
                      <select id="swal-categorie" class="swal2-input" style="width:100%;margin-bottom:0.5em;">
                        <option value="">Sélectionnez une catégorie</option>
                      </select>
                    </div>
                  </div>
                  
                </div>`,
                showCancelButton: true,
                confirmButtonText: '<i class="bi bi-check2"></i> Modifier',
                cancelButtonText: '<i class="bi bi-x"></i> Annuler',
                confirmButtonColor: '#6C63FF',
                cancelButtonColor: '#6c757d',
                width: '600px',
                preConfirm: () => {
                    return {
                        nom: document.getElementById('swal-nom').value,
                        description: document.getElementById('swal-description').value,
                        slug: document.getElementById('swal-slug').value,
                        categorie_id: document.getElementById('swal-categorie').value
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    updateService(id, result.value);
                }
            });

            // Charger les catégories dans la modale
            fetchCategories().then(() => {
                document.getElementById('swal-categorie').value = service.categorie_id;
            });
        });
};

// Fonction pour mettre à jour un service
function updateService(id, data) {
    fetch(`/admin/services/${id}`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Succès !',
                text: data.message
            });
            $('#tableServices').DataTable().ajax.reload();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Erreur !',
                text: data.message
            });
        }
    });
}

// Fonction pour supprimer un service
function deleteService(id) {
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Cette action est irréversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/services/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Supprimé !',
                        text: data.message
                    });
                    $('#tableServices').DataTable().ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur !',
                        text: data.message
                    });
                }
            });
        }
    });
}

// Fonction d'échappement HTML
function escapeHtml(text) {
    if (!text) return '';
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}
</script>
@endpush 