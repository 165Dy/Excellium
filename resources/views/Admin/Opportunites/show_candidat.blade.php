@extends('layouts.admin')

@section('title', 'Détail du Candidat')

@section('content')
<section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-banner-content text-center text-white">
                    <h1 class="page-title">Détail de la Candidature</h1>
                    <p>
                        Candidature de <strong>{{ $candidature->nom }}</strong> pour le poste de 
                        <strong>{{ $candidature->emploi->titre ?? 'N/A' }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="user-profile-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-profile-card">
                    <div class="user-profile-header">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="Avatar" class="user-avatar">
                            <div class="user-info">
                                <h3 class="user-name">{{ $candidature->nom }}</h3>
                                <p class="user-email">{{ $candidature->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('emplois.candidatures.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>

                    <div class="user-profile-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Informations Personnelles</h4>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Téléphone :</strong> {{ $candidature->telephone ?? 'Non fourni' }}</li>
                                    <li class="list-group-item"><strong>Date de candidature :</strong> {{ $candidature->created_at->format('d/m/Y H:i') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Informations sur la Candidature</h4>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Poste :</strong> {{ $candidature->emploi->titre ?? 'N/A' }}</li>
                                    <li class="list-group-item"><strong>Statut :</strong> 
                                        <span class="badge 
                                            @if($candidature->statut == 'accepte') bg-success 
                                            @elseif($candidature->statut == 'refuse') bg-danger 
                                            @else bg-warning text-dark @endif">
                                            {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4>Message de Motivation</h4>
                            <p class="message-box">{{ $candidature->message ?: 'Aucun message.' }}</p>
                        </div>

                        <div class="mt-4">
                            <h4>Documents</h4>
                            @if($candidature->cv_path)
                                <a href="{{ Storage::url($candidature->cv_path) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-file-pdf"></i> Voir le CV
                                </a>
                            @else
                                <p>Aucun CV fourni.</p>
                            @endif
                            
                            @if($candidature->lettre_motivation)
                                <a href="{{ Storage::url($candidature->lettre_motivation) }}" target="_blank" class="btn btn-info ml-2">
                                    <i class="fas fa-file-alt"></i> Voir la Lettre de Motivation
                                </a>
                            @else
                                <p class="mt-2">Aucune lettre de motivation fournie.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.user-profile-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.05);
    padding: 30px;
}
.user-profile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 20px;
}
.user-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 20px;
}
.user-name {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 5px;
}
.user-email {
    color: #666;
}
.user-profile-body h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}
.message-box {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    min-height: 100px;
}
</style>
@endpush 