<!-- Liste Formations Modal -->
<div class="modal fade" id="liste_formations" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6 p-4">
                    <h4 class="mb-2 text-primary">
                        <i class="ri-graduation-cap-line me-2"></i>
                        LISTE DES FORMATIONS
                    </h4>
                    <p class="text-muted">Gérez toutes vos formations disponibles</p>
                </div>
                
                <div class="card-datatable px-4 pb-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Titre</th>
                                    <th>Catégorie</th>
                                    <th class="text-center">Coût</th>
                                    <th>Lieu</th>
                                    <th class="text-center">Dates</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($formations as $formation)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-label-primary">{{ $formation->id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-wrapper me-3">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-initial rounded-circle bg-label-info">
                                                        <i class="ri-book-open-line"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $formation->titre }}</h6>
                                                @if($formation->programme)
                                                <small class="text-muted">{{ Str::limit($formation->programme, 50) }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-label-success">{{ $formation->categorie->nom ?? 'N/A' }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($formation->cout)
                                            <span class="fw-semibold text-primary">{{ number_format($formation->cout, 0, ',', ' ') }} FCFA</span>
                                        @else
                                            <span class="text-muted">Gratuit</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($formation->lieu)
                                            <div class="d-flex align-items-center">
                                                <i class="ri-map-pin-line text-danger me-1"></i>
                                                {{ $formation->lieu }}
                                            </div>
                                        @else
                                            <span class="text-muted">Non défini</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($formation->date_debut && $formation->date_fin)
                                            <div class="d-flex flex-column">
                                                <small class="text-success">
                                                    <i class="ri-calendar-line me-1"></i>
                                                    {{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}
                                                </small>
                                                <small class="text-danger">
                                                    <i class="ri-calendar-check-line me-1"></i>
                                                    {{ \Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        @else
                                            <span class="text-muted">À définir</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-sm btn-icon btn-outline-info" title="Voir détails" data-bs-toggle="tooltip">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-outline-warning" title="Modifier" data-bs-toggle="tooltip">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-outline-danger" title="Supprimer" data-bs-toggle="tooltip">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="avatar avatar-xl mb-3">
                                                <span class="avatar-initial rounded-circle bg-label-secondary">
                                                    <i class="ri-book-open-line ri-2x"></i>
                                                </span>
                                            </div>
                                            <h6 class="mb-1">Aucune formation trouvée</h6>
                                            <p class="text-muted mb-3">Commencez par créer votre première formation</p>
                                            <button class="btn btn-primary" data-bs-target="#create_formations" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                <i class="ri-add-line me-1"></i>
                                                Créer une formation
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($formations->isNotEmpty())
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            <small>{{ $formations->count() }} formation(s) au total</small>
                        </div>
                        <div>
                            <button class="btn btn-primary" data-bs-target="#create_formations" data-bs-toggle="modal" data-bs-dismiss="modal">
                                <i class="ri-add-line me-1"></i>
                                Nouvelle formation
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
