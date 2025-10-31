@extends('layouts.admin')
@section('list_candidats')
   

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Data Tables -->
        <div class="container text-center">
            <h1 class="mb-2">Liste des Candidats</h1>
            <h5>
                <p class="mb-0">Voici tous les candidats ayant postulé à vos offres d'emploi.</p>
            </h5>
        </div>



        @if ($candidats->isEmpty())
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <strong>Aucun candidat trouvé.</strong>
                </div>
            </div>
        @else
            <div class="card overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                            <div>
                                &nbsp; <strong>Nombre de candidats :</strong> {{ $candidats->count() }}
                            </div>
                            <div>
                                <select class="form-select" id="statutSelect"
                                    style="min-width: 200px;border:none;border-bottom:1px solid #a7a4a4">
                                    <option value="TOUT">TOUT</option>
                                    <option value="en_attente">En attente</option>
                                    <option value="accepte">Accepté</option>
                                    <option value="refuse">Refusé</option>
                                </select>
                            </div>

                        </div>
                        <thead>

                            <tr>
                                <th class="text-truncate">N°</th>
                                <th class="text-truncate">User</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Postulé pour</th>
                                <th class="text-truncate">Status</th>
                                <th class="text-truncate">Date</th>
                                <th class="text-truncate">Heure</th>
                                <th class="text-truncate">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidats as $candidat)
                                <tr data-statut="{{ strtolower($candidat->statut) }}" class="candidat-item">
                                    <td class="text-truncate">
                                        <p>0{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                @php
                                                    $avatars = [
                                                        '1.png',
                                                        '2.png',
                                                        '3.png',
                                                        '4.png',
                                                        '5.png',
                                                        '6.png',
                                                        '7.png',
                                                    ];
                                                    $avatarIndex = $candidat->id % count($avatars); // donne un index 0-6
                                                    $avatarFile = $avatars[$avatarIndex];
                                                @endphp


                                                <img src="{{ asset('assets_2/img/avatars/' . $avatarFile) }}" alt="Avatar"
                                                    class="rounded-circle" />

                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">{{ $candidat->nom }}</h6>
                                                <small class="text-truncate">{{ $candidat->telephone }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-truncate">{{ $candidat->email }}</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">
                                            <i class="icon-base ri ri-vip-crown-line icon-22px text-primary me-2"></i>
                                            <span>{{ $candidat->emploi->titre }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($candidat->statut == 'accepte')
                                            <span class="badge bg-label-success rounded-pill">Accepté</span>
                                        @elseif($candidat->statut == 'refuse')
                                            <span class="badge bg-label-danger rounded-pill">Refusé</span>
                                        @else
                                            <span class="badge bg-label-warning rounded-pill">En attente</span>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-1"><i class="ri ri-calendar-fill me-1"></i>
                                            {{ \Carbon\Carbon::parse($candidat->created_at)->format('d M Y') }}
                                        </p>

                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($candidat->created_at)->format('h:i') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.candidatures.show', $candidat->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Voir le détail <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('statutSelect');
            select.addEventListener('change', function() {
                const selected = this.value.toLowerCase();
                document.querySelectorAll('.candidat-item').forEach(function(item) {
                    const statut = item.dataset.statut.toLowerCase();
                    if (selected === "tout" || selected === statut) {
                        item.style.display = "";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    </script>


@endsection
