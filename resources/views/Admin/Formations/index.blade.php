@extends('layouts.admin')
@section('index_formations')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i
                            class="icon-base ri ri-filter-2-line icon-sm me-2"></i>Tout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i
                            class="icon-base ri ri-calculator-line icon-sm me-2"></i>Comptabilité</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-base ri ri-draft-line icon-sm me-2"></i>Fiscalité</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i
                            class="icon-base ri ri-folder-reduce-line icon-sm me-2"></i>Audit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-connections.html">
                        <i class="icon-base ri ri-computer-fill icon-sm me-2"></i>
                        Informatique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-connections.html"><i
                            class="icon-base ri ri-community-line icon-sm me-2"></i>Gestion_entreprise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-connections.html"><i
                            class="icon-base ri ri-link-m icon-sm me-2"></i>Autres</a>
                </li>
            </ul>
        </div>
        <!-- Scrollable -->
        <div class="card">
            <div class="col-md-12">

                <h2 class="card-header text-center text-md-start pb-md-0">LISTES DE TOUTES LES FORMATIONS</h2>
                <div class="card-datatable text-nowrap">
                    <table class="dt-scrollableTable table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>modules</th>
                                <th>Date</th>
                                <th>Documents</th>
                                <th>Telechargements</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem</td>
                                <td>###</td>
                                <td>###</td>
                                <td>###</td>
                                <td>21/05/2025</td>
                                <td>
                                    lorem.pdf<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="m14.829 7.757l-5.657 5.657a1 1 0 1 0 1.414 1.414l5.657-5.656A3 3 0 0 0 12 4.929l-5.657 5.657a5 5 0 0 0 7.071 7.07L19.071 12l1.414 1.414l-5.656 5.657a7 7 0 0 1-9.9-9.9l5.657-5.656a5 5 0 0 1 7.071 7.07L12 16.244A3 3 0 0 1 7.758 12l5.656-5.657z" />
                                    </svg>
                                </td>
                                <td>
                                    (258227) <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#1c1c1b"
                                            d="m16 2l5 5v14.008a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 21.008V2.992C3 2.444 3.445 2 3.993 2zm-3 10V8h-2v4H8l4 4l4-4z" />
                                    </svg>
                                </td>
                                {{-- ////////////////////ACTION ///////////////////////// --}}
                                <td>
                                    <div class="action" style="justify-content: space-between">
                                        <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" data-bs-target="#edit"
                                            data-bs-toggle="modal">
                                            <path fill="#4c9edb"
                                                d="M9.243 18.997H21v2H3v-4.243l9.9-9.9l4.242 4.243zm5.07-13.557l2.122-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                        </svg>&nbsp;&nbsp;
                                        <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" data-bs-target="#view"
                                            data-bs-toggle="modal">
                                            <path fill="#d7d041"
                                                d="M1.182 12C2.122 6.88 6.608 3 12 3s9.878 3.88 10.819 9c-.94 5.12-5.427 9-10.819 9s-9.878-3.88-10.818-9M12 17a5 5 0 1 0 0-10a5 5 0 0 0 0 10m0-2a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                        </svg>&nbsp;&nbsp;
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="confirmerSuppression({{ $formation->id }}, '{{ addslashes($formation->titre) }}')"
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2">Edit User Information</h4>
                            <p class="mb-6">Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editUserForm" class="row g-5" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                        class="form-control" value="Oliver" placeholder="Oliver" />
                                    <label for="modalEditUserFirstName">First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                        class="form-control" value="Queen" placeholder="Queen" />
                                    <label for="modalEditUserLastName">Last Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserName" name="modalEditUserName"
                                        class="form-control" value="oliver.queen" placeholder="oliver.queen" />
                                    <label for="modalEditUserName">Username</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                        class="form-control" value="oliverqueen@gmail.com"
                                        placeholder="oliverqueen@gmail.com" />
                                    <label for="modalEditUserEmail">Email</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1" selected>Active</option>
                                        <option value="2">Inactive</option>
                                        <option value="3">Suspended</option>
                                    </select>
                                    <label for="modalEditUserStatus">Status</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                        class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                                    <label for="modalEditTaxID">Tax ID</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                            class="form-control phone-number-mask" value="+1 609 933 4422"
                                            placeholder="+1 609 933 4422" />
                                        <label for="modalEditUserPhone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input id="modalEditUserLanguage" name="modalEditUserLanguage"
                                        class="form-control h-auto" placeholder="select technologies" value="English" />
                                    <label for="modalEditUserLanguage">Custom List Suggestions</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="modalEditUserCountry" name="modalEditUserCountry"
                                        class="select2 form-select" data-allow-clear="true">
                                        <option value="">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India" selected>India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                    <label for="modalEditUserCountry">Country</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="editBillingAddress" />
                                    <label for="editBillingAddress" class="text-heading">Use as a billing
                                        address?</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
                <!--/ Content -->
            </div>


            <div class="content-backdrop fade"></div>
        </div>

        <!--View User Modal -->
        <div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2">Voir Information</h4>
                        </div>
                        <form id="editUserForm" class="row g-5" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                        class="form-control" value="Oliver" placeholder="Oliver" />
                                    <label for="modalEditUserFirstName">First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                        class="form-control" value="Queen" placeholder="Queen" />
                                    <label for="modalEditUserLastName">Last Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserName" name="modalEditUserName"
                                        class="form-control" value="oliver.queen" placeholder="oliver.queen" />
                                    <label for="modalEditUserName">Username</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                        class="form-control" value="oliverqueen@gmail.com"
                                        placeholder="oliverqueen@gmail.com" />
                                    <label for="modalEditUserEmail">Email</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1" selected>Active</option>
                                        <option value="2">Inactive</option>
                                        <option value="3">Suspended</option>
                                    </select>
                                    <label for="modalEditUserStatus">Status</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                        class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                                    <label for="modalEditTaxID">Tax ID</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                            class="form-control phone-number-mask" value="+1 609 933 4422"
                                            placeholder="+1 609 933 4422" />
                                        <label for="modalEditUserPhone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input id="modalEditUserLanguage" name="modalEditUserLanguage"
                                        class="form-control h-auto" placeholder="select technologies" value="English" />
                                    <label for="modalEditUserLanguage">Custom List Suggestions</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="modalEditUserCountry" name="modalEditUserCountry"
                                        class="select2 form-select" data-allow-clear="true">
                                        <option value="">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India" selected>India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                    <label for="modalEditUserCountry">Country</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="editBillingAddress" />
                                    <label for="editBillingAddress" class="text-heading">Use as a billing
                                        address?</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
                <!--/ Content -->
            </div>


            <div class="content-backdrop fade"></div>
        </div>

    @endsection

    <script>
    function confirmerSuppression(formationId, titreFormation) {
        Swal.fire({
            title: '🗑️ Supprimer la formation ?',
            html: `
                <div class="text-center">
                    <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                    <p>Êtes-vous sûr de vouloir supprimer la formation :</p>
                    <p class="fw-bold text-primary">"${titreFormation}"</p>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Attention :</strong> Cette action est irréversible !<br>
                        Toutes les inscriptions associées seront également supprimées.
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-trash me-1"></i>Oui, supprimer définitivement',
            cancelButtonText: '<i class="fas fa-arrow-left me-1"></i>Annuler',
            reverseButtons: true,
            focusCancel: true, // Focus sur annuler par sécurité
            background: '#ffffff',
            customClass: {
                popup: 'border-0 shadow',
                title: 'text-dark',
                content: 'text-dark'
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
                
                // Afficher loading
                Swal.fire({
                    title: 'Suppression en cours...',
                    html: `
                        <div class="d-flex flex-column align-items-center">
                            <div class="spinner-border text-danger mb-3" role="status">
                                <span class="visually-hidden">Suppression...</span>
                            </div>
                            <p class="mb-0">Suppression de la formation...</p>
                        </div>
                    `,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    background: '#ffffff'
                });
                
                form.submit();
            } else {
                // Confirmation d'annulation
                Swal.fire({
                    icon: 'info',
                    title: '✅ Suppression annulée',
                    text: 'La formation n\'a pas été supprimée.',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#ffffff'
                });
            }
        });
    }
    </script>
