<?php

namespace Database\Seeders;

use Database\Seeders\MunicipioSeeders\MunicipioSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AreaSeeder::class,
            EstadoSeeder::class,
            HipotesisSeeder::class,
            AsentamientoSeeder::class,
            DireccionSeeder::class,
            DesaparicionSeeder::class
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
