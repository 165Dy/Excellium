<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Categorie;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifier que des catégories existent
        $categories = Categorie::all();
        
        if ($categories->isEmpty()) {
            // Créer quelques catégories de base si aucune n'existe
            $categorieConseil = Categorie::create([
                'nom' => 'Audit & Conseil'
            ]);
            
            $categorieCompta = Categorie::create([
                'nom' => 'Comptabilité & Fiscalité'
            ]);
            
            $categorieRH = Categorie::create([
                'nom' => 'Ressources Humaines'
            ]);
            
            $categorieFinancement = Categorie::create([
                'nom' => 'Financement'
            ]);

            $categorieGestionDeLaPaie = Categorie::create([
                'nom' => 'Gestion de la Paie'
            ]);
        } else {
            // Utiliser les catégories existantes
            $categorieConseil = $categories->first();
            $categorieCompta = $categories->skip(1)->first() ?? $categorieConseil;
            $categorieRH = $categories->skip(2)->first() ?? $categorieConseil;
            $categorieFinancement = $categories->skip(3)->first() ?? $categorieConseil;
            $categorieGestionDeLaPaie = $categories->skip(4)->first() ?? $categorieConseil;
        }

        // Créer les services
        $services = [
            [
                'nom' => 'Audit & Conseils',
                'slug' => 'service_1',
                'categorie_id' => $categorieConseil->id,
                'description' => 'Nos services d\'audit et de conseil sont conçus pour aider votre entreprise à atteindre ses objectifs grâce à des stratégies personnalisées et basées sur des données concrètes.',
                'is_active' => true,
            ],
            [
                'nom' => 'Comptabilité & Fiscalité',
                'slug' => 'service_2',
                'categorie_id' => $categorieCompta->id,
                'description' => 'Notre équipe d\'experts en comptabilité et fiscalité vous accompagne dans la gestion optimale de vos finances tout en vous assurant de respecter les obligations légales.',
                'is_active' => true,
            ],
            [
                'nom' => 'Financement',
                'slug' => 'service_3',
                'categorie_id' => $categorieFinancement->id,
                'description' => 'Découvrez nos solutions de financement adaptées à vos besoins professionnels. Que vous souhaitiez lancer un nouveau projet, développer votre activité ou optimiser votre trésorerie.',
                'is_active' => true,
            ],
            [
                'nom' => 'Gestion de la Paie',
                'slug' => 'service_4',
                'categorie_id' => $categorieGestionDeLaPaie->id,
                'description' => 'Simplifiez la gestion de vos salaires grâce à notre service professionnel et sécurisé. Confiez-nous la gestion de la paie de votre entreprise.',
                'is_active' => true,
            ],
            [
                'nom' => 'Ressources Humaines',
                'slug' => 'service_5',
                'categorie_id' => $categorieRH->id,
                'description' => 'Optimisez la gestion de vos ressources humaines grâce à notre expertise. Nous vous accompagnons dans le recrutement, la formation et le développement de vos équipes.',
                'is_active' => true,
            ],
        ];

        // Insérer les services en vérifiant qu'ils n'existent pas déjà
        foreach ($services as $serviceData) {
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']], // Condition de recherche
                $serviceData // Données à insérer/mettre à jour
            );
        }

        $this->command->info('Services créés avec succès !');
    }
}
