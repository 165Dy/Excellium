@extends('layouts.admin')
@section('index_compta')


<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Scrollable -->
    <div class="card">
        <h2 class="card-header text-center text-md-start pb-md-0">Liste des formations en Comptabilité</h2>
        <div class="card-datatable text-nowrap">
            <table class="dt-scrollableTable table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>City</th>
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
                            lorem.pdf<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000" d="m14.829 7.757l-5.657 5.657a1 1 0 1 0 1.414 1.414l5.657-5.656A3 3 0 0 0 12 4.929l-5.657 5.657a5 5 0 0 0 7.071 7.07L19.071 12l1.414 1.414l-5.656 5.657a7 7 0 0 1-9.9-9.9l5.657-5.656a5 5 0 0 1 7.071 7.07L12 16.244A3 3 0 0 1 7.758 12l5.656-5.657z"/> </svg>
                        </td>
                        <td>
                           (258227) <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#1c1c1b" d="m16 2l5 5v14.008a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 21.008V2.992C3 2.444 3.445 2 3.993 2zm-3 10V8h-2v4H8l4 4l4-4z"/></svg>     
                        </td>
                        <td>
                            <div class="action" style="justify-content: space-between">
                                <svg style="cursor: pointer" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4c9edb" d="M9.243 18.997H21v2H3v-4.243l9.9-9.9l4.242 4.243zm5.07-13.557l2.122-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z"/></svg>&nbsp;&nbsp;
                                <svg style="cursor: pointer" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#d7d041" d="M1.182 12C2.122 6.88 6.608 3 12 3s9.878 3.88 10.819 9c-.94 5.12-5.427 9-10.819 9s-9.878-3.88-10.818-9M12 17a5 5 0 1 0 0-10a5 5 0 0 0 0 10m0-2a3 3 0 1 1 0-6a3 3 0 0 1 0 6"/></svg>&nbsp;&nbsp;
                                <svg style="cursor: pointer" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#fd1800" d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6zm6.414 8l1.768-1.768l-1.414-1.414L12 12.586l-1.768-1.768l-1.414 1.414L10.586 14l-1.768 1.768l1.414 1.414L12 15.414l1.768 1.768l1.414-1.414zM9 4v2h6V4z"/></svg>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection


