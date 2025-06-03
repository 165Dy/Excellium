// ... existing code (avant la fermeture du body) ...

{{-- Modale des détails de formation --}}
<div class="modal fade" id="detailsFormationModal" tabindex="-1" aria-labelledby="detailsFormationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailsFormationModalLabel">
                    <i class="fas fa-graduation-cap me-2"></i>Détails de la formation
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body" id="detailsFormationContent">
                {{-- Le contenu sera chargé dynamiquement --}}
                <div class="text-center p-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <p class="mt-3">Chargement des détails...</p>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Fermer
                </button>
                <button type="button" class="btn btn-primary" id="exporterInscriptions" style="display: none;">
                    <i class="fas fa-download me-1"></i>Exporter les inscriptions
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Script JavaScript --}}
<script>
    // Fonction pour afficher les détails d'une formation
    function voirDetailsFormation(formationId) {
        console.log('📋 Ouverture détails formation ID:', formationId);
        
        // Ouvrir la modale
        const modal = new bootstrap.Modal(document.getElementById('detailsFormationModal'));
        modal.show();
        
        // Réinitialiser le contenu
        const contentDiv = document.getElementById('detailsFormationContent');
        contentDiv.innerHTML = `
            <div class="text-center p-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <p class="mt-3">Chargement des détails...</p>
            </div>
        `;
        
        // Requête AJAX pour récupérer les détails
        fetch(`/admin/formations/${formationId}/details`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('✅ Détails reçus:', data);
            afficherDetailsFormation(data);
        })
        .catch(error => {
            console.error('❌ Erreur chargement détails:', error);
            contentDiv.innerHTML = `
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Erreur lors du chargement des détails: ${error.message}
                </div>
            `;
        });
    }

    // Fonction pour afficher les détails dans la modale
    function afficherDetailsFormation(data) {
        const formation = data.formation;
        const inscriptions = data.inscriptions;
        
        // Mettre à jour le titre de la modale
        document.getElementById('detailsFormationModalLabel').innerHTML = `
            <i class="fas fa-graduation-cap me-2"></i>${formation.titre}
        `;
        
        // Générer le contenu de la modale
        const contentDiv = document.getElementById('detailsFormationContent');
        contentDiv.innerHTML = `
            <div class="row">
                {{-- Détails de la formation --}}
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations générales</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <strong>📝 Description:</strong>
                                    <p class="mt-1 text-muted">${formation.programme || 'Aucune description'}</p>
                                </div>
                                <div class="col-6 mb-2">
                                    <strong>📂 Catégorie:</strong><br>
                                    <span class="badge bg-success">${formation.categorie?.nom || 'Non définie'}</span>
                                </div>
                                <div class="col-6 mb-2">
                                    <strong>💰 Coût:</strong><br>
                                    <span class="text-primary fw-bold">${formation.cout ? new Intl.NumberFormat('fr-FR').format(formation.cout) + ' FCFA' : 'Gratuit'}</span>
                                </div>
                                <div class="col-6 mb-2">
                                    <strong>📅 Date début:</strong><br>
                                    <span class="text-info">${formation.date_debut ? new Date(formation.date_debut).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                </div>
                                <div class="col-6 mb-2">
                                    <strong>📅 Date fin:</strong><br>
                                    <span class="text-info">${formation.date_fin ? new Date(formation.date_fin).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                </div>
                                <div class="col-12 mb-2">
                                    <strong>📍 Lieu:</strong><br>
                                    <span class="text-secondary">${formation.lieu || 'À définir'}</span>
                                </div>
                                <div class="col-12">
                                    <strong>🎯 Prérequis:</strong><br>
                                    <span class="text-muted">${formation.prerequis || 'Aucun prérequis'}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Statistiques --}}
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-light">
                            <h6 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistiques d'inscription</h6>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4 mb-3">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body p-3">
                                            <i class="fas fa-users fa-2x mb-2"></i>
                                            <h4 class="mb-0">${inscriptions.length}</h4>
                                            <small>Total inscriptions</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body p-3">
                                            <i class="fas fa-clock fa-2x mb-2"></i>
                                            <h4 class="mb-0">${inscriptions.filter(i => i.statut === 'en_attente').length}</h4>
                                            <small>En attente</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="card bg-success text-white">
                                        <div class="card-body p-3">
                                            <i class="fas fa-check fa-2x mb-2"></i>
                                            <h4 class="mb-0">${inscriptions.filter(i => i.statut === 'confirme').length}</h4>
                                            <small>Confirmés</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ${formation.file_path ? `
                            <div class="text-center mt-3">
                                <strong>🎬 Média de présentation:</strong><br>
                                ${formation.file_type === 'image' ? 
                                    `<img src="/storage/${formation.file_path}" alt="Formation" class="img-thumbnail mt-2" style="max-height: 150px;">` :
                                    `<video controls class="mt-2" style="max-height: 150px; max-width: 100%;">
                                        <source src="/storage/${formation.file_path}" type="video/mp4">
                                    </video>`
                                }
                            </div>` : ''}
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            {{-- Liste des inscriptions --}}
            <div class="card">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="fas fa-list me-2"></i>Liste des candidats inscrits (${inscriptions.length})</h6>
                    ${inscriptions.length > 0 ? `
                    <button class="btn btn-sm btn-outline-primary" onclick="exporterInscriptions(${formation.id})">
                        <i class="fas fa-download me-1"></i>Exporter Excel
                    </button>` : ''}
                </div>
                <div class="card-body p-0">
                    ${inscriptions.length > 0 ? `
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th><i class="fas fa-user me-1"></i>Nom complet</th>
                                    <th><i class="fas fa-envelope me-1"></i>Email</th>
                                    <th><i class="fas fa-phone me-1"></i>Téléphone</th>
                                    <th><i class="fas fa-comment me-1"></i>Message</th>
                                    <th><i class="fas fa-clock me-1"></i>Date inscription</th>
                                    <th><i class="fas fa-flag me-1"></i>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${inscriptions.map((inscription, index) => `
                                <tr>
                                    <td><strong>${index + 1}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                ${inscription.nom.charAt(0).toUpperCase()}
                                            </div>
                                            <strong>${inscription.nom}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:${inscription.email}" class="text-decoration-none">
                                            ${inscription.email}
                                        </a>
                                    </td>
                                    <td>
                                        ${inscription.telephone ? `<a href="tel:${inscription.telephone}" class="text-decoration-none">${inscription.telephone}</a>` : '<span class="text-muted">Non renseigné</span>'}
                                    </td>
                                    <td>
                                        ${inscription.message ? 
                                            `<span class="text-truncate d-inline-block" style="max-width: 200px;" title="${inscription.message}">${inscription.message}</span>` : 
                                            '<span class="text-muted">Aucun message</span>'
                                        }
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            ${new Date(inscription.created_at).toLocaleDateString('fr-FR')} à 
                                            ${new Date(inscription.created_at).toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge ${inscription.statut === 'confirme' ? 'bg-success' : inscription.statut === 'refuse' ? 'bg-danger' : 'bg-warning'}">
                                            ${inscription.statut === 'confirme' ? '✅ Confirmé' : inscription.statut === 'refuse' ? '❌ Refusé' : '⏳ En attente'}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            ${inscription.statut === 'en_attente' ? `
                                            <button class="btn btn-success btn-sm" onclick="changerStatutInscription(${inscription.id}, 'confirme')" title="Confirmer">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="changerStatutInscription(${inscription.id}, 'refuse')" title="Refuser">
                                                <i class="fas fa-times"></i>
                                            </button>` : ''}
                                            <button class="btn btn-outline-primary btn-sm" onclick="contacterCandidat('${inscription.email}', '${inscription.nom}')" title="Contacter">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>`).join('')}
                            </tbody>
                        </table>
                    </div>` : `
                    <div class="text-center p-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Aucune inscription pour le moment</h5>
                        <p class="text-muted">Les candidatures apparaîtront ici dès qu'il y en aura.</p>
                    </div>`}
                </div>
            </div>
        `;
        
        // Afficher le bouton d'export si il y a des inscriptions
        const exportBtn = document.getElementById('exporterInscriptions');
        if (inscriptions.length > 0) {
            exportBtn.style.display = 'inline-block';
            exportBtn.onclick = () => exporterInscriptions(formation.id);
        } else {
            exportBtn.style.display = 'none';
        }
    }

    // Fonction pour changer le statut d'une inscription
    function changerStatutInscription(inscriptionId, nouveauStatut) {
        if (!confirm(`Êtes-vous sûr de vouloir ${nouveauStatut === 'confirme' ? 'confirmer' : 'refuser'} cette inscription ?`)) {
            return;
        }
        
        fetch(`/admin/inscriptions/${inscriptionId}/statut`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({ statut: nouveauStatut })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Recharger les détails de la formation
                const formationId = data.formation_id;
                voirDetailsFormation(formationId);
                
                // Notification de succès
                const message = nouveauStatut === 'confirme' ? 'Inscription confirmée avec succès !' : 'Inscription refusée.';
                showNotification(message, 'success');
            } else {
                showNotification('Erreur lors de la mise à jour du statut.', 'error');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Erreur de connexion.', 'error');
        });
    }

    // Fonction pour contacter un candidat
    function contacterCandidat(email, nom) {
        const subject = `Formation Excellium Conseil - Votre candidature`;
        const body = `Bonjour ${nom},\n\nNous avons bien reçu votre demande d'inscription à notre formation.\n\nCordialement,\nL'équipe Excellium Conseil`;
        
        window.location.href = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    }

    // Fonction pour exporter les inscriptions
    function exporterInscriptions(formationId) {
        const link = document.createElement('a');
        link.href = `/admin/formations/${formationId}/export-inscriptions`;
        link.download = `inscriptions_formation_${formationId}.xlsx`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Fonction utilitaire pour afficher des notifications
    function showNotification(message, type) {
        // Tu peux utiliser ton système de notification existant
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                text: message,
                icon: type === 'success' ? 'success' : 'error',
                timer: 3000,
                showConfirmButton: false
            });
        } else {
            alert(message);
        }
    }
    
</script>

// ... existing code ...

<script>
    function confirmerSuppression(formationId, titreFormation) {
        Swal.fire({
            title: '🗑️ Supprimer définitivement ?',
            html: `
                <div class="text-center p-3">
                    <div class="mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center animate__animated animate__pulse animate__slow animate__infinite" 
                            style="width: 100px; height: 100px; background: linear-gradient(135deg, #dc3545, #fd7e14);">
                            <i class="fas fa-exclamation-triangle text-white" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-3 text-danger">Attention ! Action irréversible</h5>
                    <p class="text-muted mb-3">
                        Vous êtes sur le point de supprimer la formation :
                    </p>
                    <div class="alert alert-primary border-0 shadow-sm mb-3">
                        <h6 class="fw-bold mb-0">"${titreFormation}"</h6>
                    </div>
                    <div class="alert alert-danger border-0 shadow-sm">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle me-3 text-danger" style="font-size: 1.5rem;"></i>
                            <div class="text-start">
                                <strong>Conséquences :</strong><br>
                                <small>• Suppression définitive de la formation</small><br>
                                <small>• Suppression de toutes les inscriptions</small><br>
                                <small>• Cette action ne peut pas être annulée</small>
                            </div>
                        </div>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#28a745',
            confirmButtonText: '<i class="fas fa-trash me-2"></i>Oui, supprimer définitivement',
            cancelButtonText: '<i class="fas fa-shield-alt me-2"></i>Non, conserver',
            reverseButtons: true,
            focusCancel: true,
            background: '#ffffff',
            backdrop: 'rgba(220, 53, 69, 0.1)',
            customClass: {
                popup: 'border-0 shadow-lg rounded-4',
                title: 'text-dark fs-4 fw-bold',
                content: 'text-dark',
                confirmButton: 'btn btn-danger btn-lg px-4 fw-bold shadow-sm',
                cancelButton: 'btn btn-success btn-lg px-4 fw-bold shadow-sm',
                actions: 'gap-3'
            },
            buttonsStyling: false,
            showClass: {
                popup: 'animate__animated animate__shakeX animate__faster'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Créer et soumettre le formulaire de suppression
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/formations/${formationId}`;
                form.style.display = 'none';
                
                // Token CSRF
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                form.appendChild(csrfInput);
                
                // Method DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                // Ajouter au DOM et soumettre
                document.body.appendChild(form);
                
                // Afficher loading stylé
                Swal.fire({
                    title: '🗑️ Suppression en cours...',
                    html: `
                        <div class="d-flex flex-column align-items-center p-4">
                            <div class="position-relative mb-4">
                                <div class="spinner-border text-danger" 
                                    style="width: 4rem; height: 4rem; border-width: 5px;" role="status">
                                    <span class="visually-hidden">Suppression...</span>
                                </div>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <i class="fas fa-trash text-danger animate__animated animate__pulse animate__infinite" 
                                    style="font-size: 1.2rem;"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-danger mb-2">Suppression en cours...</h6>
                            <p class="mb-0 text-muted">Veuillez ne pas fermer cette page</p>
                            <div class="progress mt-3" style="width: 200px; height: 6px;">
                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" 
                                    style="width: 100%"></div>
                            </div>
                        </div>
                    `,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    background: '#ffffff',
                    customClass: {
                        popup: 'border-0 shadow-lg rounded-4',
                        title: 'text-dark fw-bold'
                    }
                });
                
                form.submit();
            } else {
                // Confirmation d'annulation stylée
                Swal.fire({
                    title: '🛡️ Formation conservée !',
                    html: `
                        <div class="text-center p-3">
                            <div class="mb-3">
                                <i class="fas fa-shield-alt text-success animate__animated animate__bounceIn" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="fw-bold text-success mb-3">Parfait ! Aucune suppression</h5>
                            <p class="text-muted">
                                La formation "<strong>${titreFormation}</strong>" a été conservée en sécurité.
                            </p>
                        </div>
                    `,
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#ffffff',
                    customClass: {
                        popup: 'border-0 shadow-lg rounded-4',
                        title: 'text-dark fw-bold',
                        timerProgressBar: 'bg-success'
                    },
                    showClass: {
                        popup: 'animate__animated animate__fadeInUp animate__faster'
                    }
                });
            }
        });
    }

</script>
