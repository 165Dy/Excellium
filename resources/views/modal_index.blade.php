 <!-- Modal -->
 <!-- Edit User Modal -->
 <div class="modal fade" id="create_formations" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-simple modal-edit-user">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="text-center mb-6">
                     <h4 class="mb-2">Ajouter une Formation</h4>
                 </div>
                 <!-- Formulaire de création de formation stylisé -->
                 <form action="{{ route('formations.store') }}" method="POST" class="row g-4">
                     @csrf
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="titre" name="titre" class="form-control"
                                 placeholder="Titre" required>
                             <label for="titre">Titre</label>
                         </div>
                     </div>

                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <select name="categorie_id" id="categorie_id" class="form-select" required>
                                 {{-- @foreach ($categories as $categorie)
                                     <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                 @endforeach --}}
                             </select>
                             <label for="categorie_id">Catégorie</label>
                         </div>
                     </div>

                     <div class="col-12">
                         <div class="form-floating form-floating-outline">
                             <textarea name="programme" id="programme" class="form-control" placeholder="Programme" style="height: 100px"></textarea>
                             <label for="programme">Programme</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="number" step="0.01" id="cout" name="cout" class="form-control"
                                 placeholder="Coût">
                             <label for="cout">Coût</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="lieu" name="lieu" class="form-control"
                                 placeholder="Lieu">
                             <label for="lieu">Lieu</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="date" id="date_debut" name="date_debut" class="form-control"
                                 placeholder="Date de début">
                             <label for="date_debut">Date de début</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="date" id="date_fin" name="date_fin" class="form-control"
                                 placeholder="Date de fin">
                             <label for="date_fin">Date de fin</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <textarea name="prerequis" id="prerequis" class="form-control" placeholder="Prérequis" style="height: 80px"></textarea>
                             <label for="prerequis">Prérequis</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <textarea name="bonus" id="bonus" class="form-control" placeholder="Bonus" style="height: 80px"></textarea>
                             <label for="bonus">Bonus</label>
                         </div>
                     </div>
                     <div class="col-12 text-center">
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">
                             Annuler
                         </button>
                         <button type="submit" class="btn btn-primary me-3">Créer</button>

                     </div>
                 </form>
             </div>


         </div>
         <!--/ Content -->
     </div>
     <div class="content-backdrop fade"></div>
 </div>

 <!-- Opportunités Class Modal -->
 <div class="modal fade" id="create_opportunites" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-simple modal-edit-user">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="text-center mb-6">
                     <h4 class="mb-2">Ajouter une Opportunité</h4>
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

 <!-- Categories User Modal -->
 <div class="modal fade" id="create_categories" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-simple modal-edit-user">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="text-center mb-6">
                     <h4 class="mb-2">NOUVELLE CATEGORIE</h4>
                 </div>
                 <form id="createCategorieForm" class="row g-5" method="POST"
                     action="{{ route('categories.store') }}">
                     @csrf
                     <div class="col-12">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="nomCategorie" name="nom" class="form-control"
                                 placeholder="comptabilité" required />
                             <label for="nomCategorie">Nom Catégorie</label>
                         </div>
                     </div>

                     <div class="col-12 text-center">
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">Fermer</button>
                         <button type="submit" class="btn btn-primary me-3">Valider</button>

                     </div>
                 </form>
             </div>


         </div>
         <!--/ Content -->
     </div>
     <div class="content-backdrop fade"></div>
 </div>


 <!-- Categories Liste Modal -->
 <div class="modal fade" id="liste_categories" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-simple modal-edit-user">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="text-center mb-6">
                     <h4 class="mb-2">LISTE DES CATEGORIES</h4>
                 </div>
                 <div class="card-datatable text-nowrap">
                     <table class="dt-scrollableTable table table-bordered table-responsive">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th>Nom Categorie</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>Lorem ipsum</td>
                                 {{-- ////////////////////ACTION ///////////////////////// --}}
                                 <td>
                                     <div class="action" style="justify-content: space-between">
                                         <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24"
                                             data-bs-target="#edit" data-bs-toggle="modal">
                                             <path fill="#4c9edb"
                                                 d="M9.243 18.997H21v2H3v-4.243l9.9-9.9l4.242 4.243zm5.07-13.557l2.122-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                         </svg>&nbsp;&nbsp;

                                         <svg id="confirm-color" style="cursor: pointer"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                             <path fill="#fd1800"
                                                 d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6zm6.414 8l1.768-1.768l-1.414-1.414L12 12.586l-1.768-1.768l-1.414 1.414L10.586 14l-1.768 1.768l1.414 1.414L12 15.414l1.768 1.768l1.414-1.414zM9 4v2h6V4z" />
                                         </svg>
                                     </div>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <!--/ Content -->
     </div>
     <div class="content-backdrop fade"></div>
 </div>
 <!--/ Content wrapper -->
