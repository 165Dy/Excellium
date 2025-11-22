<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Vous êtes sur le point de supprimer <strong id="userName"></strong>.</p>
                        <p class="text-muted mb-3">Pour confirmer, entrez le code de sécurité à 5 chiffres : 85246 </p>
                        <div class="mb-3">
                            <label for="security_code" class="form-label fw-bold">Code de sécurité</label>
                            <input type="text" 
                                   id="security_code"
                                   name="security_code" 
                                   class="form-control form-control-lg text-center" 
                                   maxlength="5" 
                                   pattern="\d{5}"
                                   required 
                                   placeholder="00000"
                                   autocomplete="off"
                                   style="letter-spacing: 0.5em; font-size: 1.2rem; font-weight: bold;">
                            <div class="form-text">Entrez le code à 5 chiffres pour confirmer la suppression</div>
                            <div id="security_code_error" class="text-danger mt-2" style="display: none;">
                                <small>Code incorrect. Veuillez réessayer.</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger" id="submitDeleteBtn">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Supprimer définitivement
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteUserForm');
            const userNameSpan = document.getElementById('userName');
            const securityCodeInput = document.getElementById('security_code');
            const securityCodeError = document.getElementById('security_code_error');
            const submitBtn = document.getElementById('submitDeleteBtn');
            const submitBtnSpinner = submitBtn.querySelector('.spinner-border');

            // Code secret défini ici (doit correspondre à celui du contrôleur)
            const SECURITY_CODE = "85246";

            // Réinitialiser le formulaire quand la modale s'ouvre
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const userId = button.getAttribute('data-user-id');
                const userName = button.getAttribute('data-user-name');

                userNameSpan.textContent = userName;
                deleteForm.action = `/admin/users/${userId}`;
                
                // Réinitialiser les champs
                securityCodeInput.value = '';
                securityCodeError.style.display = 'none';
                securityCodeInput.classList.remove('is-invalid');
                submitBtn.disabled = false;
                submitBtnSpinner.classList.add('d-none');
            });

            // Empêcher le copier-coller
            securityCodeInput.addEventListener('paste', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Action non autorisée',
                    text: 'Le copier-coller est désactivé pour des raisons de sécurité. Veuillez saisir le code manuellement.',
                    icon: 'warning',
                    confirmButtonText: 'Compris',
                    customClass: {
                        confirmButton: 'btn btn-warning waves-effect'
                    },
                    buttonsStyling: false
                });
                return false;
            });

            securityCodeInput.addEventListener('copy', function(e) {
                e.preventDefault();
                return false;
            });

            securityCodeInput.addEventListener('cut', function(e) {
                e.preventDefault();
                return false;
            });

            // Empêcher le clic droit (menu contextuel)
            securityCodeInput.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                return false;
            });

            // Empêcher les raccourcis clavier Ctrl+C, Ctrl+V, Ctrl+X
            securityCodeInput.addEventListener('keydown', function(e) {
                // Bloquer Ctrl+C (copier)
                if (e.ctrlKey && e.key === 'c') {
                    e.preventDefault();
                    return false;
                }
                // Bloquer Ctrl+V (coller)
                if (e.ctrlKey && e.key === 'v') {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Action non autorisée',
                        text: 'Le copier-coller est désactivé pour des raisons de sécurité. Veuillez saisir le code manuellement.',
                        icon: 'warning',
                        confirmButtonText: 'Compris',
                        customClass: {
                            confirmButton: 'btn btn-warning waves-effect'
                        },
                        buttonsStyling: false
                    });
                    return false;
                }
                // Bloquer Ctrl+X (couper)
                if (e.ctrlKey && e.key === 'x') {
                    e.preventDefault();
                    return false;
                }
                // Bloquer Ctrl+A (sélectionner tout) - optionnel mais recommandé
                if (e.ctrlKey && e.key === 'a') {
                    e.preventDefault();
                    return false;
                }
            });

            // Limiter l'input aux chiffres uniquement
            securityCodeInput.addEventListener('input', function(e) {
                // Ne garder que les chiffres
                this.value = this.value.replace(/\D/g, '');
                
                // Masquer l'erreur si l'utilisateur tape
                if (securityCodeError.style.display !== 'none') {
                    securityCodeError.style.display = 'none';
                    this.classList.remove('is-invalid');
                }
            });

            // Validation en temps réel du code
            securityCodeInput.addEventListener('blur', function() {
                if (this.value.length === 5 && this.value !== SECURITY_CODE) {
                    this.classList.add('is-invalid');
                    securityCodeError.style.display = 'block';
                } else if (this.value === SECURITY_CODE) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    securityCodeError.style.display = 'none';
                }
            });

            // Soumission du formulaire via AJAX
            deleteForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const enteredCode = securityCodeInput.value.trim();
                const formAction = deleteForm.action;

                // Validation côté client
                if (enteredCode.length !== 5) {
                    Swal.fire({
                        title: 'Code incomplet',
                        text: 'Veuillez entrer un code à 5 chiffres.',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-warning waves-effect'
                        },
                        buttonsStyling: false
                    });
                    securityCodeInput.focus();
                    return;
                }

                if (enteredCode !== SECURITY_CODE) {
                    securityCodeInput.classList.add('is-invalid');
                    securityCodeError.style.display = 'block';
                    Swal.fire({
                        title: 'Code incorrect',
                        text: 'Le code de sécurité est incorrect. Veuillez réessayer.',
                        icon: 'error',
                        confirmButtonText: 'Réessayer',
                        customClass: {
                            confirmButton: 'btn btn-danger waves-effect'
                        },
                        buttonsStyling: false
                    });
                    securityCodeInput.focus();
                    return;
                }

                // Demander confirmation finale
                Swal.fire({
                    title: 'Confirmer la suppression ?',
                    html: `Vous êtes sur le point de supprimer définitivement <strong>${userNameSpan.textContent}</strong>.<br><br>Cette action est irréversible !`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    customClass: {
                        confirmButton: 'btn btn-danger me-2 waves-effect waves-light',
                        cancelButton: 'btn btn-secondary waves-effect'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Désactiver le bouton et afficher le spinner
                        submitBtn.disabled = true;
                        submitBtnSpinner.classList.remove('d-none');

                        // Préparer les données
                        const formData = new FormData(deleteForm);
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        formData.append('_token', csrfToken);
                        formData.append('_method', 'DELETE');

                        // Envoyer la requête AJAX
                        fetch(formAction, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Fermer la modale
                                const modalInstance = bootstrap.Modal.getInstance(deleteModal);
                                modalInstance.hide();

                                // Afficher la modale de succès
                                Swal.fire({
                                    title: 'Suppression réussie !',
                                    html: `L'utilisateur <strong>${data.user_name}</strong> a été supprimé avec succès.`,
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#28a745',
                                    customClass: {
                                        confirmButton: 'btn btn-success waves-effect'
                                    },
                                    buttonsStyling: false
                                }).then(() => {
                                    // Recharger la page pour mettre à jour la liste
                                    window.location.reload();
                                });
                            } else {
                                // Réactiver le bouton
                                submitBtn.disabled = false;
                                submitBtnSpinner.classList.add('d-none');

                                // Afficher l'erreur
                                Swal.fire({
                                    title: 'Erreur',
                                    text: data.message || 'Une erreur est survenue lors de la suppression.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn btn-danger waves-effect'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        })
                        .catch(error => {
                            // Réactiver le bouton
                            submitBtn.disabled = false;
                            submitBtnSpinner.classList.add('d-none');

                            console.error('Erreur:', error);
                            Swal.fire({
                                title: 'Erreur',
                                text: 'Une erreur est survenue lors de la communication avec le serveur.',
                                icon: 'error',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-danger waves-effect'
                                },
                                buttonsStyling: false
                            });
                        });
                    }
                });
            });
        });
    </script>