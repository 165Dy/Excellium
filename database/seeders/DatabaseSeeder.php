<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer le compte super_admin
        User::factory()->create([
            'nom' => 'Super',
            'prenom' => 'Admin',
            'email' => 'super.admin@excellium.com',
            'password' => bcrypt('SuperAdmin123!'),
            'type' => 'super_admin',
            'email_verified_at' => now(),
        ]);

        // Créer un compte admin de test
        User::factory()->create([
            'nom' => 'Admin',
            'prenom' => 'Test',
            'email' => 'admin@excellium.com',
            'password' => bcrypt('Admin123!'),
            'type' => 'admin',
            'email_verified_at' => now(),
        ]);

        // User::factory(10)->create();

        // Appel des autres seeders
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}
