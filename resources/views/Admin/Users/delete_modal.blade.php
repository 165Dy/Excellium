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
                        <p class="text-muted">Pour confirmer, entrez le code de sécurité à 5 chiffres :</p>
                        <input type="text" name="security_code" class="form-control" maxlength="5" pattern="\d{5}"
                            required placeholder="Ex : 1***5">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
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

            // Code secret défini ici (doit correspondre à celui du contrôleur)
            const SECURITY_CODE = "85246";

            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const userId = button.getAttribute('data-user-id');
                const userName = button.getAttribute('data-user-name');

                userNameSpan.textContent = userName;
                deleteForm.action = `/admin/users/${userId}`;
            });

            deleteForm.addEventListener('submit', function(e) {
                const enteredCode = deleteForm.querySelector('input[name="security_code"]').value.trim();

                if (enteredCode !== SECURITY_CODE) {
                    e.preventDefault(); // Empêche la suppression
                    Swal.fire({
                        title: 'Code incorrect',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'Réessayer',
                        customClass: {
                            confirmButton: 'btn btn-danger waves-effect'
                        },
                        buttonsStyling: false
                    });
                } else {
                    // 🔥 On demande confirmation avant de supprimer
                    e.preventDefault(); // On arrête d’abord pour éviter la suppression immédiate
                    Swal.fire({
                        title: 'Confirmer la suppression ?',
                        text: 'Cette action est irréversible !',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Oui, supprimer',
                        cancelButtonText: 'Annuler',
                        customClass: {
                            confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
                            cancelButton: 'btn btn-outline-secondary waves-effect'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // ✅ Envoie le formulaire si confirmé
                            deleteForm.submit();
                        }
                    });
                }
            });
        });
    </script>