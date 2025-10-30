@extends('layouts.admin')
@section('dashboard')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6 mb-6">
            <!-- Sales Overview-->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-1">Vue d’ensemble du système</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="systemOverview" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="systemOverview">
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="location.reload()">
                                        <i class="ri ri-refresh-line me-2"></i> Actualiser
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="exportStats()">
                                        <i class="ri ri-file-download-line me-2"></i> Exporter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-wrap justify-content-between gap-4">
                        <!-- Formation -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="ri ri-book-2-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $formations_count ?? 0 }}</h5>
                                <p class="mb-0">Formations</p>
                            </div>
                        </div>

                        <!-- Emploi -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <i class="ri ri-briefcase-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $emplois_count ?? 0 }}</h5>
                                <p class="mb-0">Emplois</p>
                            </div>
                        </div>

                        <!-- Opportunités -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="ri ri-hand-coin-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $opportunites_count ?? 0 }}</h5>
                                <p class="mb-0">Opportunités</p>
                            </div>
                        </div>

                        <!-- Services -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="ri ri-customer-service-2-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $services_count ?? 0 }}</h5>
                                <p class="mb-0">Services</p>
                            </div>
                        </div>

                        <!-- Catégories -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <i class="ri ri-folder-2-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $categories_count ?? 0 }}</h5>
                                <p class="mb-0">Catégories</p>
                            </div>
                        </div>

                        <!-- Produits -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-secondary rounded">
                                    <i class="ri ri-shopping-bag-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $produits_count ?? 0 }}</h5>
                                <p class="mb-0">Produits</p>
                            </div>
                        </div>
                        <!-- Invitations -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="ri ri-mail-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $invitations_count ?? 0 }}</h5>
                                <p class="mb-0">Invitations</p>
                            </div>
                        </div>
                        <!-- Entreprises -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <i class="ri ri-building-4-line icon-24px"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $entreprises_count ?? 0 }}</h5>
                                <p class="mb-0">Entreprises</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @php
                use Carbon\Carbon;

                // Nombre d'utilisateurs aujourd'hui et hier
                $today_count = $users_count ?? 0;
                $yesterday_count = \App\Models\User::whereDate('created_at', Carbon::yesterday())->count();

                // Déterminer l'icône et la couleur
                if ($today_count > $yesterday_count) {
                    $evolution_icon = 'ri ri-arrow-up-s-line text-success';
                } elseif ($today_count < $yesterday_count) {
                    $evolution_icon = 'ri ri-arrow-down-s-line text-danger ';
                } else {
                    $evolution_icon = ''; // aucune flèche si stable
                                }
            @endphp

            <!-- Ratings -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h5 class="mb-2 text-nowrap">Utilisateurs inscrits</h5>
                                    <div class="badge bg-label-primary rounded-pill lh-xs">
                                        {{ Carbon::now()->format('d/m/Y') }}</div>
                                    <small class="text-muted d-block"></small>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <h3 class="mb-0 me-2">{{ $today_count }}</h3>
                                    @if ($evolution_icon)
                                        <i class="icon-base {{ $evolution_icon }}" style="height: 3rem;width:4rem;"></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-ratings-illustration.png') }}"
                                    alt="Ratings" class="img-fluid" width="95" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sessions -->
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <div class="card-info mb-5">
                                    <h5 class="mb-2 text-nowrap">Sessions</h5>
                                    <div class="badge bg-label-success rounded-pill lh-xs">last_month</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0 me-2">122k</h4>
                                    <p class="mb-0 text-danger">255</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-end d-flex align-items-end">
                            <div class="card-body pb-0 pt-7">
                                <img src="{{ asset('assets_2/img/illustrations/card-session-illustration.png') }}"
                                    alt="Ratings" class="img-fluid" width="81" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-6">
            <!-- Activity Timeline -->
            <div class="col-12 col-md-7 col-xl-6 order-md-2 order-xl-0">
                <!-- visits By Day Chart-->

                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1">Visites par jour</h5>
                            <div class="dropdown">
                                <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-1"
                                    type="button" id="visitsByDayDropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base ri ri-more-2-line"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="visitsByDayDropdown">
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="refreshVisitsChart()">
                                        <i class="ri ri-refresh-line me-2"></i>Actualiser
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="exportVisitsData()">
                                        <i class="ri ri-download-line me-2"></i>Exporter (CSV)
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="shareVisitsChart()">
                                        <i class="ri ri-share-line me-2"></i>Partager
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 card-subtitle" id="visitsSubtitle">Chargement...</p>
                    </div>
                    <div class="card-body">
                        <div id="visitsByDayChart"></div>
                        <div class="d-flex justify-content-between mt-4">
                            <div>
                                <h6 class="mb-0">Jour le plus visité</h6>
                                <p class="mb-0 small" id="mostVisitedDayText">Chargement...</p>
                            </div>
                            <a href="{{ route('admin.visits.index') }}" class="avatar" title="Voir tous les détails">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="icon-base ri ri-arrow-right-s-line icon-24px scaleX-n1-rtl"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!--/ Activity Timeline -->

            <!-- Top Referral Source Mobile  -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Modules du système</h5>
                            <p class="card-subtitle mb-0">Nombre d'éléments</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn text-body-secondary p-0" type="button" id="topModulesDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topModulesDropdown">
                                <a class="dropdown-item" href="javascript:void(0);">Voir plus</a>
                                <a class="dropdown-item" href="javascript:void(0);">Supprimer</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="nav nav-tabs nav-tabs-widget pb-6 gap-4 mx-1 d-flex flex-nowrap align-items-center"
                            role="tablist">
                            @php
                                $modules = [
                                    ['items' => $formations, 'label' => 'Formations', 'icon' => 'ri ri-book-open-line'],
                                    ['items' => $emplois, 'label' => 'Emplois', 'icon' => 'ri ri-briefcase-line'],
                                    [
                                        'items' => $opportunites,
                                        'label' => 'Opportunités',
                                        'icon' => 'ri ri-hand-coin-line',
                                    ],
                                    ['items' => $services, 'label' => 'Services', 'icon' => 'ri ri-service-line'],
                                    ['items' => $produits, 'label' => 'Produits', 'icon' => 'ri ri-shopping-bag-line'],
                                    ['items' => $invitations, 'label' => 'Invitations', 'icon' => 'ri ri-mail-send-line'],
                                    ['items' => $entreprises, 'label' => 'Entreprises', 'icon' => 'ri ri-building-line'],
                                ];
                            @endphp

                            @foreach ($modules as $key => $module)
                                <li class="nav-item">
                                    <a href="javascript:void(0);"
                                        class="nav-link btn {{ $key === 0 ? 'active' : '' }} d-flex flex-column align-items-center justify-content-center"
                                        role="tab" data-bs-toggle="tab"
                                        data-bs-target="#module-tab-{{ $key }}"
                                        aria-controls="module-tab-{{ $key }}"
                                        aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="{{ $module['icon'] }} fs-3 mb-1" ></i>
                                            <span class="small text-center">{{ $module['label'] }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content p-0">
                        @foreach ($modules as $key => $module)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="module-tab-{{ $key }}" role="tabpanel">
                                <div class="table-responsive text-nowrap">
                                    @if ($module['items']->isEmpty())
                                        <div class="p-3 text-center text-muted">Aucun enregistrement pour
                                            {{ $module['label'] }}</div>
                                    @else
                                        <table class="table border-top mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="bg-transparent border-bottom">#</th>
                                                    <th class="bg-transparent border-bottom">Nom / Titre</th>
                                                    <th class="text bg-transparent border-bottom">Statut</th>
                                                    <th class="text-end bg-transparent border-bottom">date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($module['items'] as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar avatar-sm">
                                                                <div
                                                                    class="avatar-initial bg-label-{{ $key + 1 }} rounded">
                                                                    <i class="{{ $module['icon'] }}" style="color: blue;"></i>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->titre ?? ($item->nom ?? '—') }}</td>
                                                        <td>
                                                            @if (isset($item->status))
                                                                <div class="badge bg-label-primary rounded-pill">
                                                                    {{ $item->status }}</div>
                                                            @else
                                                                <div class="badge bg-label-secondary rounded-pill">Actif
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            {{ isset($item->created_at) ? $item->created_at->format('d/m/Y') : '—' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <!--/ Top Referral Source Mobile -->


        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function exportStats() {
            // Simple exemple: on peut exporter en CSV ou JSON
            let stats = {
                Formations: {{ $formations_count ?? 0 }},
                Emplois: {{ $emplois_count ?? 0 }},
                Opportunites: {{ $opportunites_count ?? 0 }},
                Services: {{ $services_count ?? 0 }},
                Categories: {{ $categories_count ?? 0 }},
                Produits: {{ $produits_count ?? 0 }},
                Entreprises: {{ $entreprises_count ?? 0 }},
                Invitations: {{ $invitations_count ?? 0 }},
                Utilisateurs: {{ $users_count ?? 0 }}
            };
            let dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(stats));
            let dlAnchorElem = document.createElement('a');
            dlAnchorElem.setAttribute("href", dataStr);
            dlAnchorElem.setAttribute("download", "stats.json");
            dlAnchorElem.click();
        }

        // ===== GRAPHIQUE DES VISITES PAR JOUR =====
        let visitsChart = null;
        let visitsData = null;
        
        async function loadVisitsChart() {
            try {
                console.log('📊 Chargement des statistiques de visites...');
                const response = await fetch('/admin/visits/stats');
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                
                const data = await response.json();
                visitsData = data; // Stocker les données globalement
                
                console.log('✅ Données reçues:', data);
                
                // Mettre à jour le total des visites avec ID spécifique
                const subtitleElement = document.getElementById('visitsSubtitle');
                if (subtitleElement) {
                    subtitleElement.textContent = `Total ${data.total_visits_week.toLocaleString('fr-FR')} visites (7 jours)`;
                }
                
                // Mettre à jour le jour le plus visité avec ID spécifique
                const mostVisitedElement = document.getElementById('mostVisitedDayText');
                if (mostVisitedElement && data.most_visited_day) {
                    const mostVisitedText = `${data.most_visited_day.visits.toLocaleString('fr-FR')} visites le ${data.most_visited_day.day}`;
                    mostVisitedElement.textContent = mostVisitedText;
                }
                
                // Préparer les données pour le graphique
                const categories = data.visits_by_day.map(item => item.day);
                const series = data.visits_by_day.map(item => item.count);
                
                // Options du graphique
                const chartOptions = {
                    series: [{
                        name: 'Visites',
                        data: series
                    }],
                    chart: {
                        type: 'bar',
                        height: 280,
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800
                        }
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            distributed: true,
                            columnWidth: '55%'
                        }
                    },
                    colors: ['#7367F0', '#28C76F', '#FF9F43', '#EA5455', '#00CFE8', '#7367F0', '#FF9F43'],
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        categories: categories,
                        labels: {
                            style: {
                                fontSize: '13px',
                                colors: ['#6c757d']
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(val) {
                                return Math.floor(val);
                            },
                            style: {
                                colors: ['#6c757d']
                            }
                        }
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + ' visites';
                            }
                        },
                        theme: 'light'
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                        strokeDashArray: 4
                    }
                };
                
                // Détruire l'ancien graphique s'il existe
                if (visitsChart) {
                    visitsChart.destroy();
                }
                
                // Créer et afficher le nouveau graphique
                visitsChart = new ApexCharts(document.querySelector("#visitsByDayChart"), chartOptions);
                await visitsChart.render();
                
                console.log('✅ Graphique affiché avec succès');
                
            } catch (error) {
                console.error('❌ Erreur lors du chargement des statistiques:', error);
                
                const subtitleElement = document.getElementById('visitsSubtitle');
                if (subtitleElement) {
                    subtitleElement.textContent = 'Erreur de chargement des données';
                    subtitleElement.classList.add('text-danger');
                }
                
                const mostVisitedElement = document.getElementById('mostVisitedDayText');
                if (mostVisitedElement) {
                    mostVisitedElement.textContent = 'Erreur de chargement';
                }
            }
        }
        
        // Fonction pour actualiser le graphique
        function refreshVisitsChart() {
            console.log('🔄 Actualisation du graphique...');
            
            // Animation de chargement
            const subtitleElement = document.getElementById('visitsSubtitle');
            if (subtitleElement) {
                subtitleElement.textContent = 'Actualisation...';
            }
            
            loadVisitsChart().then(() => {
                // Toast de confirmation
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Graphique actualisé',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        }
        
        // Fonction pour exporter les données en CSV
        function exportVisitsData() {
            if (!visitsData) {
                Swal.fire('Erreur', 'Aucune donnée à exporter', 'error');
                return;
            }
            
            console.log('📥 Export des données en CSV...');
            
            // Créer le contenu CSV
            let csvContent = "Date,Jour,Visites\n";
            visitsData.visits_by_day.forEach(item => {
                csvContent += `${item.date},${item.day},${item.count}\n`;
            });
            
            // Créer un blob et télécharger
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement("a");
            const url = URL.createObjectURL(blob);
            
            link.setAttribute("href", url);
            link.setAttribute("download", `visites_${new Date().toISOString().split('T')[0]}.csv`);
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Toast de confirmation
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Fichier CSV téléchargé',
                showConfirmButton: false,
                timer: 2000
            });
        }
        
        // Fonction pour partager le graphique
        function shareVisitsChart() {
            if (!visitsData) {
                Swal.fire('Erreur', 'Aucune donnée à partager', 'error');
                return;
            }
            
            const shareText = `📊 Statistiques Excellium\n\n` +
                `Total des visites (7 jours) : ${visitsData.total_visits_week}\n` +
                `Jour le plus visité : ${visitsData.most_visited_day.day} (${visitsData.most_visited_day.visits} visites)\n\n` +
                `Visiteurs uniques aujourd'hui : ${visitsData.today.unique_visitors}\n` +
                `Utilisateurs authentifiés : ${visitsData.today.authenticated_users}`;
            
            // Vérifier si l'API Web Share est disponible
            if (navigator.share) {
                navigator.share({
                    title: 'Statistiques Excellium',
                    text: shareText
                }).then(() => {
                    console.log('✅ Partagé avec succès');
                }).catch((error) => {
                    console.log('❌ Erreur de partage:', error);
                });
            } else {
                // Fallback : copier dans le presse-papiers
                navigator.clipboard.writeText(shareText).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copié !',
                        text: 'Les statistiques ont été copiées dans le presse-papiers',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }).catch(() => {
                    // Si clipboard ne fonctionne pas, afficher les données dans une modale
                    Swal.fire({
                        title: 'Statistiques',
                        html: `<pre style="text-align: left; font-size: 12px;">${shareText}</pre>`,
                        confirmButtonText: 'Fermer'
                    });
                });
            }
        }
        
        // Charger le graphique au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🚀 Initialisation du dashboard...');
            loadVisitsChart();
        });
    </script>
@endpush
