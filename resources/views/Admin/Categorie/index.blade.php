@extends('layouts.admin')
@section('index_categorie')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Scrollable -->
        <div class="card">
            <div class="col-md-12">

                <h5 class="card-header text-center text-md-start pb-md-0">Liste des Categories</h5>
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
                                        <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" data-bs-target="#edit"
                                            data-bs-toggle="modal">
                                            <path fill="#4c9edb"
                                                d="M9.243 18.997H21v2H3v-4.243l9.9-9.9l4.242 4.243zm5.07-13.557l2.122-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                        </svg>&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
                                        <svg id="confirm-color" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24">
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

        <!-- Edit User Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2">Modifier la Categorie</h4>
                            <p class="mb-6">Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editUserForm" class="row g-5" onsubmit="return false">
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserName" name="modalEditUserName"
                                        class="form-control" value="" placeholder="comptabilité " />
                                    <label for="modalEditUserName">Nom Categorie</label>
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

    </div>
@endsection
