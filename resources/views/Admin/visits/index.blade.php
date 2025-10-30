@extends('layouts.admin')

@section('dashboard')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">📊 Gestion des Visites</h4>
                <p class="text-muted mb-0">Analyse détaillée du trafic de votre plateforme</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-primary" onclick="refreshAllData()">
                    <i class="ri ri-refresh-line me-1"></i>Actualiser
                </button>
                <button class="btn btn-primary" onclick="exportAllData()">
                    <i class="ri ri-download-line me-1"></i>Exporter
                </button>
            </div>
        </div>

        <!-- Statistiques en cartes -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="ri ri-eye-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-primary rounded-pill">Aujourd'hui</span>
                        </div>
                        <h4 class="mb-1" id="todayVisits">-</h4>
                        <p class="mb-0">Visites totales</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <i class="ri ri-user-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-success rounded-pill">Uniques</span>
                        </div>
                        <h4 class="mb-1" id="uniqueVisitors">-</h4>
                        <p class="mb-0">Visiteurs uniques</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="ri ri-shield-user-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-info rounded-pill">Connectés</span>
                        </div>
                        <h4 class="mb-1" id="authenticatedUsers">-</h4>
                        <p class="mb-0">Utilisateurs authentifiés</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="ri ri-calendar-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-warning rounded-pill">7 jours</span>
                        </div>
                        <h4 class="mb-1" id="weekVisits">-</h4>
                        <p class="mb-0">Total semaine</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="row g-4 mb-4">
            <!-- Visites par jour -->
            <div class="col-xl-8">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Visites par jour</h5>
                            <p class="text-muted mb-0 small">7 derniers jours</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-text-secondary rounded-pill" type="button" 
                                data-bs-toggle="dropdown">
                                <i class="ri ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="exportChart('day')">
                                    <i class="ri ri-download-line me-2"></i>Exporter
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="visitsByDayChart" style="min-height: 350px;"></div>
                    </div>
                </div>
            </div>

            <!-- Top pages -->
            <div class="col-xl-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Pages les plus visitées</h5>
                        <p class="text-muted mb-0 small">7 derniers jours</p>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0" id="topPagesList">
                            <li class="d-flex justify-content-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visites par heure et répartition -->
        <div class="row g-4 mb-4">
            <!-- Visites par heure -->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Visites par heure</h5>
                        <p class="text-muted mb-0 small">Aujourd'hui</p>
                    </div>
                    <div class="card-body">
                        <div id="visitsByHourChart" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Répartition devices -->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Répartition par appareil</h5>
                        <p class="text-muted mb-0 small">7 derniers jours</p>
                    </div>
                    <div class="card-body">
                        <div id="deviceChart" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des visites récentes -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Visites récentes</h5>
                    <p class="text-muted mb-0 small">100 dernières visites</p>
                </div>
                <div class="d-flex gap-2">
                    <input type="date" class="form-control form-control-sm" id="filterDate" 
                        onchange="filterByDate(this.value)">
                    <button class="btn btn-sm btn-outline-secondary" onclick="clearFilters()">
                        <i class="ri ri-close-line"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date & Heure</th>
                            <th>Page</th>
                            <th>IP</th>
                            <th>Appareil</th>
                            <th>Navigateur</th>
                            <th>Utilisateur</th>
                            <th>Référent</th>
                        </tr>
                    </thead>
                    <tbody id="recentVisitsTable">
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center mb-0" id="pagination">
                        <!-- Pagination sera générée dynamiquement -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let visitsByDayChart, visitsByHourChart, deviceChart;
        let currentPage = 1;
        let filterDate = null;

        // Charger toutes les données
        async function loadAllData() {
            console.log('📊 Chargement de toutes les données...');
            await Promise.all([
                loadStats(),
                loadVisitsByDay(),
                loadVisitsByHour(),
                loadTopPages(),
                loadDeviceStats(),
                loadRecentVisits()
            ]);
        }

        // Charger les statistiques
        async function loadStats() {
            try {
                const response = await fetch('/admin/visits/stats');
                const data = await response.json();
                
                document.getElementById('todayVisits').textContent = 
                    data.today.total_visits.toLocaleString('fr-FR');
                document.getElementById('uniqueVisitors').textContent = 
                    data.today.unique_visitors.toLocaleString('fr-FR');
                document.getElementById('authenticatedUsers').textContent = 
                    data.today.authenticated_users.toLocaleString('fr-FR');
                document.getElementById('weekVisits').textContent = 
                    data.total_visits_week.toLocaleString('fr-FR');
            } catch (error) {
                console.error('❌ Erreur chargement stats:', error);
            }
        }

        // Charger visites par jour
        async function loadVisitsByDay() {
            try {
                const response = await fetch('/admin/visits/by-day');
                const {data} = await response.json();
                
                const categories = data.map(item => item.day);
                const series = data.map(item => item.count);

                if (visitsByDayChart) {
                    visitsByDayChart.destroy();
                }

                const options = {
                    series: [{
                        name: 'Visites',
                        data: series
                    }],
                    chart: {
                        type: 'area',
                        height: 350,
                        toolbar: {show: false},
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800
                        }
                    },
                    colors: ['#7367F0'],
                    dataLabels: {enabled: false},
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.3
                        }
                    },
                    xaxis: {
                        categories: categories,
                        labels: {
                            style: {fontSize: '13px', colors: ['#6c757d']}
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: val => Math.floor(val),
                            style: {colors: ['#6c757d']}
                        }
                    },
                    tooltip: {
                        y: {formatter: val => val + ' visites'}
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                        strokeDashArray: 4
                    }
                };

                visitsByDayChart = new ApexCharts(
                    document.querySelector("#visitsByDayChart"), 
                    options
                );
                await visitsByDayChart.render();
            } catch (error) {
                console.error('❌ Erreur visites par jour:', error);
            }
        }

        // Charger visites par heure
        async function loadVisitsByHour() {
            try {
                const response = await fetch('/admin/visits/by-hour');
                const {data} = await response.json();
                
                const categories = Object.keys(data).map(h => `${h}h`);
                const series = Object.values(data);

                if (visitsByHourChart) {
                    visitsByHourChart.destroy();
                }

                const options = {
                    series: [{
                        name: 'Visites',
                        data: series
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {show: false}
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: '60%',
                            colors: {
                                ranges: [{
                                    from: 0,
                                    to: 1000,
                                    color: '#28C76F'
                                }]
                            }
                        }
                    },
                    dataLabels: {enabled: false},
                    xaxis: {
                        categories: categories,
                        labels: {
                            rotate: -45,
                            style: {fontSize: '11px'}
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: val => Math.floor(val)
                        }
                    },
                    tooltip: {
                        y: {formatter: val => val + ' visites'}
                    }
                };

                visitsByHourChart = new ApexCharts(
                    document.querySelector("#visitsByHourChart"), 
                    options
                );
                await visitsByHourChart.render();
            } catch (error) {
                console.error('❌ Erreur visites par heure:', error);
            }
        }

        // Charger top pages
        async function loadTopPages() {
            try {
                const response = await fetch('/admin/visits/top-pages?limit=10');
                const {data} = await response.json();
                
                const html = data.map((page, index) => `
                    <li class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center w-100">
                            <div class="badge bg-label-primary rounded me-3">${index + 1}</div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">${page.url}</h6>
                                <small class="text-muted">${page.visits} visites</small>
                            </div>
                            <div class="text-end">
                                <div class="progress" style="width: 80px; height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: ${(page.visits / data[0].visits) * 100}%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                `).join('');
                
                document.getElementById('topPagesList').innerHTML = html || 
                    '<li class="text-center text-muted">Aucune donnée</li>';
            } catch (error) {
                console.error('❌ Erreur top pages:', error);
            }
        }

        // Charger stats devices
        async function loadDeviceStats() {
            try {
                const response = await fetch('/admin/visits/device-stats');
                const {data} = await response.json();
                
                if (deviceChart) {
                    deviceChart.destroy();
                }

                const options = {
                    series: data.map(d => d.count),
                    labels: data.map(d => d.device || 'Inconnu'),
                    chart: {
                        type: 'donut',
                        height: 300
                    },
                    colors: ['#7367F0', '#28C76F', '#FF9F43', '#EA5455'],
                    legend: {
                        position: 'bottom'
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    name: {
                                        fontSize: '16px'
                                    },
                                    value: {
                                        fontSize: '22px',
                                        fontWeight: 600
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: () => data.reduce((a, b) => a + b.count, 0)
                                    }
                                }
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                height: 250
                            }
                        }
                    }]
                };

                deviceChart = new ApexCharts(
                    document.querySelector("#deviceChart"), 
                    options
                );
                await deviceChart.render();
            } catch (error) {
                console.error('❌ Erreur device stats:', error);
            }
        }

        // Charger visites récentes
        async function loadRecentVisits(page = 1) {
            currentPage = page;
            try {
                let url = `/admin/visits/recent?page=${page}`;
                if (filterDate) {
                    url += `&date=${filterDate}`;
                }
                
                const response = await fetch(url);
                const {data, meta} = await response.json();
                
                const html = data.map((visit, index) => `
                    <tr>
                        <td>${(meta.current_page - 1) * meta.per_page + index + 1}</td>
                        <td>
                            <small>${new Date(visit.visited_at).toLocaleDateString('fr-FR')}</small><br>
                            <small class="text-muted">${new Date(visit.visited_at).toLocaleTimeString('fr-FR')}</small>
                        </td>
                        <td><code class="small">${visit.url}</code></td>
                        <td><small>${visit.ip}</small></td>
                        <td>
                            <span class="badge bg-label-${visit.device === 'desktop' ? 'primary' : visit.device === 'mobile' ? 'success' : 'info'}">
                                ${visit.device || 'N/A'}
                            </span>
                        </td>
                        <td><small>${visit.browser || 'N/A'}</small></td>
                        <td>
                            ${visit.user ? `<span class="badge bg-label-success">${visit.user.nom || 'Utilisateur'}</span>` : '<span class="text-muted">Anonyme</span>'}
                        </td>
                        <td><small class="text-muted">${visit.referrer ? new URL(visit.referrer).hostname : '-'}</small></td>
                    </tr>
                `).join('');
                
                document.getElementById('recentVisitsTable').innerHTML = html || 
                    '<tr><td colspan="8" class="text-center text-muted">Aucune visite</td></tr>';
                
                // Pagination
                renderPagination(meta);
            } catch (error) {
                console.error('❌ Erreur visites récentes:', error);
                document.getElementById('recentVisitsTable').innerHTML = 
                    '<tr><td colspan="8" class="text-center text-danger">Erreur de chargement</td></tr>';
            }
        }

        // Render pagination
        function renderPagination(meta) {
            const {current_page, last_page} = meta;
            let html = '';
            
            // Previous
            html += `
                <li class="page-item ${current_page === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="javascript:void(0);" onclick="loadRecentVisits(${current_page - 1})">
                        <i class="ri ri-arrow-left-s-line"></i>
                    </a>
                </li>
            `;
            
            // Pages
            for (let i = Math.max(1, current_page - 2); i <= Math.min(last_page, current_page + 2); i++) {
                html += `
                    <li class="page-item ${i === current_page ? 'active' : ''}">
                        <a class="page-link" href="javascript:void(0);" onclick="loadRecentVisits(${i})">${i}</a>
                    </li>
                `;
            }
            
            // Next
            html += `
                <li class="page-item ${current_page === last_page ? 'disabled' : ''}">
                    <a class="page-link" href="javascript:void(0);" onclick="loadRecentVisits(${current_page + 1})">
                        <i class="ri ri-arrow-right-s-line"></i>
                    </a>
                </li>
            `;
            
            document.getElementById('pagination').innerHTML = html;
        }

        // Filtrer par date
        function filterByDate(date) {
            filterDate = date;
            loadRecentVisits(1);
        }

        // Effacer filtres
        function clearFilters() {
            filterDate = null;
            document.getElementById('filterDate').value = '';
            loadRecentVisits(1);
        }

        // Actualiser toutes les données
        function refreshAllData() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: 'Actualisation en cours...',
                showConfirmButton: false,
                timer: 1000
            });
            
            loadAllData().then(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Données actualisées',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        }

        // Exporter toutes les données
        function exportAllData() {
            window.location.href = '/admin/visits/export';
        }

        // Exporter un graphique
        function exportChart(type) {
            console.log('Export chart:', type);
            // À implémenter selon les besoins
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🚀 Initialisation page visites...');
            loadAllData();
        });
    </script>
@endpush

