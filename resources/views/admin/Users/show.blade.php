@extends('layouts.admin')
@section('show_users')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container mt-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Détails de l'utilisateur</h4>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm">← Retour</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Nom</h6>
                            <p>{{ $user->nom }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Prénom</h6>
                            <p>{{ $user->prenom }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Email</h6>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Téléphone</h6>
                            <p>{{ $user->telephone ?? '—' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Type</h6>
                            <span class="badge {{ $user->type === 'super_admin' ? 'bg-danger' : 'bg-secondary' }}">
                                {{ ucfirst(str_replace('_', ' ', $user->type)) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Créé le</h6>
                            <p>{{ $user->created_at->format('d/m/Y à H:i') }}</p>
                        </div>

                    </div>



                    <div class="d-flex justify-content-end">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                            data-user-id="{{ $user->id }}" data-user-name="{{ $user->nom }} {{ $user->prenom }}">
                            Supprimer cet utilisateur
                        </button>
                    </div>
                </div>


            </div>
        </div>
        @if ($user->type !== 'super_admin')
            <h5 class="mt-4 text-primary">Modules de participation</h5>

            @if ($participations->count() > 0)
                <div class="card-datatable text-nowrap">
                    <table class="dt-scrollableTable table table-bordered table-responsive">
                        <thead class="table-light">
                            <tr>
                                <th>Type</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Statut</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participations as $item)
                                <tr>

                                    <td>
                                        <span class="badge bg-primary">
                                            {{ ucfirst($item->type ?? '—') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item instanceof \App\Models\Formation)
                                            {{ $item->titre }}
                                        @elseif($item instanceof \App\Models\Candidature)
                                            {{ $item->emploi->titre ?? '—' }}
                                        @elseif($item instanceof \App\Models\Postulation)
                                            {{ $item->opportunite->titre ?? '—' }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">
                                            @if ($item instanceof \App\Models\Formation)
                                                {{ $item->categorie->nom ?? '—' }}
                                            @elseif($item instanceof \App\Models\Candidature)
                                                {{ $item->emploi->type_contrat ?? '—' }}
                                            @elseif($item instanceof \App\Models\Postulation)
                                                {{ $item->opportunite->categorie->nom ?? '—' }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item instanceof \App\Models\Formation)
                                            {{ $item->date_debut?->format('d/m/Y') ?? '—' }}
                                        @else
                                            {{ $item->created_at?->format('d/m/Y') ?? '—' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item instanceof \App\Models\Formation)
                                            {{ \Carbon\Carbon::parse($item->date_fin)->format('d/m/Y') ?? '—' }}
                                        @elseif($item instanceof \App\Models\Candidature)
                                            {{ \Carbon\Carbon::parse($item->emploi->date_expiration)->format('d/m/Y') ?? '—' }}
                                        @elseif($item instanceof \App\Models\Postulation)
                                            {{ \Carbon\Carbon::parse($item->opportunite->date_fin)->format('d/m/Y') ?? '—' }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                          @if ($item instanceof \App\Models\Formation)
                                            {{ $item->pivot->statut ?? 'en attente' }}
                                        @else
                                            {{ $item->statut ?? '—' }}
                                        @endif  
                                        </span>
                                        
                                    </td>
                                    <td>
                                        @if ($item instanceof \App\Models\Formation)
                                            {{ $item->pivot->message ?? '—' }}
                                        @elseif($item instanceof \App\Models\Candidature)
                                            {{ $item->message ?? '—' }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted mt-2">Aucune participation enregistrée.</p>
            @endif
        @endif

        @if ($user->type === 'super_admin' || $user->type === 'admin')
            <h5 class="mt-4 text-primary">Invitations envoyées</h5>

            @if ($invitations->count() > 0)
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nom invité</th>
                                <th>Email</th>
                                <th>Date d’envoi</th>
                                <th>Expiration</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr>
                                    <td>{{ $invitation->nom }} {{ $invitation->prenom }}</td>
                                    <td>{{ $invitation->email }}</td>
                                    <td>{{ $invitation->created_at?->format('d/m/Y à H:i') ?? '—' }}</td>
                                    <td> {{ \Carbon\Carbon::parse($item->emploi->date_expiration)->format('d/m/Y') ?? '—' }}
                                    </td>
                                    <td>
                                        @if ($invitation->used_at)
                                            <span class="badge bg-success">Utilisée</span>
                                        @elseif($invitation->expires_at < now())
                                            <span class="badge bg-danger">Expirée</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Active</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted mt-2">Aucune invitation envoyée.</p>
            @endif
        @endif


        @include('admin.users.delete_modal')


        <!-- /Modals -->
    </div>
@endsection
