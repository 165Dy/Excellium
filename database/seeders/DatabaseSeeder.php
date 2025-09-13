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
        // User::factory(10)->create();

        User::factory()->create([
            'nom' => 'User',
            'prenom' => 'Test',
            'email' => 'test@example.com',
        ]);

        // Appel des autres seeders
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}
