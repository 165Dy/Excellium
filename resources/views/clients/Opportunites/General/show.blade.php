@extends('layouts.master')
@section('Opportunite_show')
    <!--====== Start Page Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span>
        </div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span>
        </div>
        <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">{{ $opportunite->titre }}</h2>
                            <p>{{ \Illuminate\Support\Str::limit($opportunite->description, 150) }}</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li><a href="{{ route('clients.opportunites.business.index') }}">Opportunités</a></li>
                                <li class="active">{{ $opportunite->titre }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Opportunity Details Section ======-->
    <section class="blog-grid-section secondary-dark-bg pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <div class="main-post">
                            <div class="block-image mb-4">
                                <img src="{{ asset('assets/images/opportunities/opportunity-detail.jpg') }}"
                                    alt="{{ $opportunite->titre }}"
                                    onerror="this.src='{{ asset('assets/images/blog/blog-6.jpg') }}'"
                                    style="width: 100%; height: 500px; object-fit: cover; border-radius: 8px;">
                                <div class="post-categories">
                                    <span class="badge bg-primary">{{ $opportunite->categorie->nom ?? 'Général' }}</span>
                                    @if ($opportunite->statut === 'en_ligne')
                                        <span class="badge bg-success">En ligne</span>
                                    @elseif($opportunite->statut === 'ferme')
                                        <span class="badge bg-danger">Fermé</span>
                                    @endif
                                </div>
                            </div>

                            <div class="post-content">
                                <div class="post-meta mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="meta-item">
                                                <i class="far fa-calendar-alt"></i>
                                                Publié le {{ $opportunite->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                        @if ($opportunite->lieu)
                                            <div class="col-md-6">
                                                <span class="meta-item">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ $opportunite->lieu }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="post-details">
                                    <h3 class="title mb-4">Description de l'opportunité</h3>
                                    <div class="content">
                                        {!! nl2br(e($opportunite->description)) !!}
                                    </div>
                                </div>

                                @if ($opportunite->date_debut || $opportunite->date_fin)
                                    <div class="opportunity-dates mt-5">
                                        <h4 class="title mb-3">Informations importantes</h4>
                                        <div class="row">
                                            @if ($opportunite->date_debut)
                                                <div class="col-md-6">
                                                    <div class="info-card">
                                                        <i class="fas fa-play-circle text-primary"></i>
                                                        <div>
                                                            <h6 style="color: black">Date de début</h6>
                                                            <p>{{ \Carbon\Carbon::parse($opportunite->date_debut)->format('d/m/Y H:i') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($opportunite->date_fin)
                                                <div class="col-md-6">
                                                    <div class="info-card">
                                                        <i class="fas fa-stop-circle text-danger"></i>
                                                        <div>
                                                            <h6 style="color: black">Date de clôture</h6>
                                                            <p>{{ \Carbon\Carbon::parse($opportunite->date_fin)->format('d/m/Y H:i') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($opportunite->contact_email)
                                    <div class="contact-info mt-5">
                                        <h4 class="title mb-3">Contact</h4>
                                        <div class="contact-card">
                                            <i class="fas fa-envelope text-primary"></i>
                                            <div>
                                                <h6 style="color: black">Email de contact</h6>
                                                <p><a href="mailto:{{ $opportunite->contact_email }}">{{ $opportunite->contact_email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($opportunite->criteres)
                                    <div class="criteria-info mt-5">
                                        <h4 class="title mb-3">Critères requis Experience</h4>
                                        <div class="criteria-list">
                                            @foreach ($opportunite->criteres as $critere)
                                                <div class="criteria-item">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                    <span>{{ $critere }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($opportunite->informations)
                                    <div class="additional-info mt-5">
                                        <h4 class="title mb-3">Informations complémentaires</h4>
                                        <div class="info-content">
                                            @foreach ($opportunite->informations as $key => $info)
                                                <div class="info-item">
                                                    <strong>{{ ucfirst($key) }} :</strong> {{ $info }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        <!-- Candidature Widget -->
                        <div class="widget widget-candidature mb-40">
                            <div class="widget-title">
                                <h4>Postuler à cette opportunité</h4>
                            </div>
                            <div class="widget-content">
                                @if ($opportunite->date_fin && \Carbon\Carbon::parse($opportunite->date_fin) < now())
                                    <div class="alert alert-danger">
                                        <i class="fas fa-times-circle"></i>
                                        Cette opportunité est fermée
                                    </div>
                                @elseif($opportunite->statut !== 'en_ligne')
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Cette opportunité n'est plus disponible
                                    </div>
                                @else
                                    <div class="candidature-form">
                                        <form id="quickCandidatureForm">
                                            @csrf
                                            <input type="hidden" name="opportunite_id" value="{{ $opportunite->id }}">

                                            <div class="mb-3-0">
                                                <label class="form-label">Nom complet</label>
                                                <input type="text" name="nom_complet" class="form-control" required>
                                            </div>

                                            <div class="mb-3-0">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>

                                            <div class="mb-3-0">
                                                <label class="form-label">Téléphone</label>
                                                <input type="tel" name="telephone" class="form-control">
                                            </div>

                                            <div class="mb-3-0">
                                                <label class="form-label">Message de motivation</label>
                                                <textarea name="message" class="form-control" rows="3"
                                                    placeholder="Pourquoi êtes-vous intéressé par cette opportunité ?"></textarea>
                                            </div><br>

                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-paper-plane me-2"></i>Envoyer ma candidature
                                            </button>
                                            <style>
                                                .mb-3-0,
                                                .label {
                                                    color: black;
                                                }
                                            </style>

                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Statistiques Widget -->
                        <div class="widget widget-stats mb-40">
                            <div class="widget-title">
                                <h4>Statistiques</h4>
                            </div>
                            <div class="widget-content">
                                <div class="stats-item">
                                    <i class="fas fa-users text-primary"></i>
                                    <div>
                                        <span class="number">{{ $opportunite->postulations->count() }}</span>
                                        <span
                                            class="label">Candidat{{ $opportunite->postulations->count() > 1 ? 's' : '' }}</span>
                                    </div>
                                </div>
                                <div class="stats-item">
                                    <i class="fas fa-eye text-info"></i>
                                    <div>
                                        <span class="number">{{ rand(50, 5000) }}</span>
                                        <span class="label">Vues</span>
                                    </div>
                                </div>
                                <div class="stats-item">
                                    <i class="fas fa-calendar text-warning"></i>
                                    <div>
                                        <span class="number">{{ $opportunite->created_at->diffForHumans() }}</span>
                                        <span class="label">Publié</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Opportunités similaires -->
                        @if ($similaires->count() > 0)
                            <div class="widget widget-similar mb-40">
                                <div class="widget-title">
                                    <h4>Opportunités similaires</h4>
                                </div>
                                <div class="widget-content">
                                    @foreach ($similaires as $similaire)
                                        <div class="similar-item">
                                            <div class="similar-thumbnail">
                                                <img src="{{ asset('assets/images/blog/blog-6.jpg') }}"
                                                    alt="{{ $similaire->titre }}">
                                            </div>
                                            <div class="similar-content">
                                                <h6><a
                                                        href="{{ route('opportunites.show_public', $similaire->slug) }}">{{ \Illuminate\Support\Str::limit($similaire->titre, 50) }}</a>
                                                </h6>
                                                <span
                                                    class="similar-category">{{ $similaire->categorie->nom ?? 'Général' }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Opportunity Details Section ======-->

    <style>
        .post-categories .badge {
            margin-right: 5px;
            font-size: 12px;
        }

        .info-card,
        .contact-card {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .info-card i,
        .contact-card i {
            font-size: 24px;
            margin-right: 15px;
            min-width: 30px;
        }

        .info-card h6,
        .contact-card h6 {
            margin: 0 0 5px 0;
            font-weight: 600;
        }

        .info-card p,
        .contact-card p {
            margin: 0;
            color: #6c757d;
        }

        .criteria-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .criteria-item i {
            margin-right: 10px;
            font-size: 16px;
        }

        .info-item {
            margin-bottom: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .widget {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .widget-title h4 {
            margin: 0 0 20px 0;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .stats-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .stats-item i {
            font-size: 24px;
            margin-right: 15px;
            min-width: 30px;
        }

        .stats-item .number {
            display: block;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .stats-item .label {
            font-size: 14px;
            color: #6c757d;
        }

        .similar-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .similar-thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 15px;
        }

        .similar-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .similar-content h6 {
            margin: 0 0 5px 0;
            font-size: 14px;
        }

        .similar-content h6 a {
            color: #333;
            text-decoration: none;
        }

        .similar-content h6 a:hover {
            color: #007bff;
        }

        .similar-category {
            font-size: 12px;
            color: #6c757d;
        }

        .candidature-form .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }

        .candidature-form .btn-primary {
            background: #007bff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert i {
            margin-right: 8px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('quickCandidatureForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;

                    // Afficher un indicateur de chargement
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...';
                    submitBtn.disabled = true;

                    fetch('{{ route('opportunites.candidature') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Candidature envoyée !',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Réinitialiser le formulaire
                                    form.reset();
                                });
                            } else {
                                let errorMessage = data.message ||
                                    'Erreur lors de l\'envoi de la candidature';
                                if (data.errors) {
                                    errorMessage += '\n\nErreurs :\n';
                                    Object.values(data.errors).forEach(error => {
                                        errorMessage += '- ' + error[0] + '\n';
                                    });
                                }
                                Swal.fire('Erreur', errorMessage, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            Swal.fire('Erreur', 'Une erreur inattendue est survenue', 'error');
                        })
                        .finally(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        });
                });
            }
        });
    </script>
@endsection
