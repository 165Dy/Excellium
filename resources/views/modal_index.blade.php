 <!-- Modal -->
 <!-- Edit User Modal -->
 <div class="modal fade" id="create_formations" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-simple modal-edit-user">
         <div class="modal-content">
             <div class="modal-body p-0">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <div class="text-center mb-6">
                     <h4 class="mb-2">@lang('extracted.ajouter_une_formation')</h4>
                 </div>
                 <!-- Formulaire de création de formation stylisé -->
                 <form action="{{ route('formations.store') }}" method="POST" class="row g-4">
                     @csrf
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="titre" name="titre" class="form-control"
                                 placeholder="Titre" required>
                             <label for="titre">@lang('extracted.titre')</label>
                         </div>
                     </div>

                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <select name="categorie_id" id="categorie_id" class="form-select" required>
                                 {{-- @foreach ($categories as $categorie)
                                     <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                 @endforeach --}}
                             </select>
                             <label for="categorie_id">@lang('extracted.categorie')</label>
                         </div>
                     </div>

                     <div class="col-12">
                         <div class="form-floating form-floating-outline">
                             <textarea name="programme" id="programme" class="form-control" placeholder="Programme" style="height: 100px"></textarea>
                             <label for="programme">@lang('extracted.programme')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="number" step="0.01" id="cout" name="cout" class="form-control"
                                 placeholder="Coût">
                             <label for="cout">@lang('extracted.cout')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="lieu" name="lieu" class="form-control"
                                 placeholder="Lieu">
                             <label for="lieu">@lang('extracted.lieu')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="date" id="date_debut" name="date_debut" class="form-control"
                                 placeholder="Date de début">
                             <label for="date_debut">@lang('extracted.date_de_debut')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="date" id="date_fin" name="date_fin" class="form-control"
                                 placeholder="Date de fin">
                             <label for="date_fin">@lang('extracted.date_de_fin')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <textarea name="prerequis" id="prerequis" class="form-control" placeholder="Prérequis" style="height: 80px"></textarea>
                             <label for="prerequis">@lang('extracted.prerequis')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <textarea name="bonus" id="bonus" class="form-control" placeholder="Bonus" style="height: 80px"></textarea>
                             <label for="bonus">@lang('extracted.bonus')</label>
                         </div>
                     </div>
                     <div class="col-12 text-center">
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">
                             Annuler
                         </button>
                         <button type="submit" class="btn btn-primary me-3">@lang('extracted.creer')</button>

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
                     <h4 class="mb-2">@lang('extracted.ajouter_une_opportunite')</h4>
                 </div>
                 <form id="editUserForm" class="row g-5" onsubmit="return false">
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                 class="form-control" value="Oliver" placeholder="Oliver" />
                             <label for="modalEditUserFirstName">@lang('extracted.first_name')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                 class="form-control" value="Queen" placeholder="Queen" />
                             <label for="modalEditUserLastName">@lang('extracted.last_name')</label>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="modalEditUserName" name="modalEditUserName"
                                 class="form-control" value="oliver.queen" placeholder="oliver.queen" />
                             <label for="modalEditUserName">@lang('extracted.username')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                 class="form-control" value="oliverqueen@gmail.com"
                                 placeholder="oliverqueen@gmail.com" />
                             <label for="modalEditUserEmail">@lang('extracted.email')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                                 aria-label="Default select example">
                                 <option value="1" selected>@lang('extracted.active')</option>
                                 <option value="2">@lang('extracted.inactive')</option>
                                 <option value="3">@lang('extracted.suspended')</option>
                             </select>
                             <label for="modalEditUserStatus">@lang('extracted.status')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="modalEditTaxID" name="modalEditTaxID"
                                 class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                             <label for="modalEditTaxID">@lang('extracted.tax_id')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="input-group input-group-merge">
                             <span class="input-group-text">@lang('extracted.us_1')</span>
                             <div class="form-floating form-floating-outline">
                                 <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                     class="form-control phone-number-mask" value="+1 609 933 4422"
                                     placeholder="+1 609 933 4422" />
                                 <label for="modalEditUserPhone">@lang('extracted.phone_number')</label>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <input id="modalEditUserLanguage" name="modalEditUserLanguage"
                                 class="form-control h-auto" placeholder="select technologies" value="English" />
                             <label for="modalEditUserLanguage">@lang('extracted.custom_list_suggestions')</label>
                         </div>
                     </div>
                     <div class="col-12 col-md-6">
                         <div class="form-floating form-floating-outline">
                             <select id="modalEditUserCountry" name="modalEditUserCountry"
                                 class="select2 form-select" data-allow-clear="true">
                                 <option value="">@lang('extracted.select')</option>
                                 <option value="Australia">@lang('extracted.australia')</option>
                                 <option value="Bangladesh">@lang('extracted.bangladesh')</option>
                                 <option value="Belarus">@lang('extracted.belarus')</option>
                                 <option value="Brazil">@lang('extracted.brazil')</option>
                                 <option value="Canada">@lang('extracted.canada')</option>
                                 <option value="China">@lang('extracted.china')</option>
                                 <option value="France">@lang('extracted.france')</option>
                                 <option value="Germany">@lang('extracted.germany')</option>
                                 <option value="India" selected>@lang('extracted.india')</option>
                                 <option value="Indonesia">@lang('extracted.indonesia')</option>
                                 <option value="Israel">@lang('extracted.israel')</option>
                                 <option value="Italy">@lang('extracted.italy')</option>
                                 <option value="Japan">@lang('extracted.japan')</option>
                                 <option value="Korea">@lang('extracted.korea_republic_of')</option>
                                 <option value="Mexico">@lang('extracted.mexico')</option>
                                 <option value="Philippines">@lang('extracted.philippines')</option>
                                 <option value="Russia">@lang('extracted.russian_federation')</option>
                                 <option value="South Africa">@lang('extracted.south_africa')</option>
                                 <option value="Thailand">@lang('extracted.thailand')</option>
                                 <option value="Turkey">@lang('extracted.turkey')</option>
                                 <option value="Ukraine">@lang('extracted.ukraine')</option>
                                 <option value="United Arab Emirates">@lang('extracted.united_arab_emirates')</option>
                                 <option value="United Kingdom">@lang('extracted.united_kingdom')</option>
                                 <option value="United States">@lang('extracted.united_states')</option>
                             </select>
                             <label for="modalEditUserCountry">@lang('extracted.country')</label>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-check form-switch">
                             <input type="checkbox" class="form-check-input" id="editBillingAddress" />
                             <label for="editBillingAddress" class="text-heading">@lang('extracted.use_as_a_billing_address')</label>
                         </div>
                     </div>
                     <div class="col-12 text-center">
                         <button type="submit" class="btn btn-primary me-3">@lang('extracted.submit')</button>
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
                     <h4 class="mb-2">@lang('extracted.nouvelle_categorie')</h4>
                 </div>
                 <form id="createCategorieForm" class="row g-5" method="POST"
                     action="{{ route('categories.store') }}">
                     @csrf
                     <div class="col-12">
                         <div class="form-floating form-floating-outline">
                             <input type="text" id="nomCategorie" name="nom" class="form-control"
                                 placeholder="comptabilité" required />
                             <label for="nomCategorie">@lang('extracted.nom_categorie')</label>
                         </div>
                     </div>

                     <div class="col-12 text-center">
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">@lang('extracted.fermer')</button>
                         <button type="submit" class="btn btn-primary me-3">@lang('extracted.valider')</button>

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
                     <h4 class="mb-2">@lang('extracted.liste_des_categories')</h4>
                 </div>
                 <div class="card-datatable text-nowrap">
                     <table class="dt-scrollableTable table table-bordered table-responsive">
                         <thead>
                             <tr>
                                 <th>@lang('extracted.id')</th>
                                 <th>@lang('extracted.nom_categorie')</th>
                                 <th>@lang('extracted.action')</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>@lang('extracted.lorem_ipsum')</td>
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
