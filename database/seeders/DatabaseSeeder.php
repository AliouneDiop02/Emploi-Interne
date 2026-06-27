<?php

namespace Database\Seeders;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::firstOrcreate([
            'name'              => 'Admin',
            'email'             => 'admin@example.com',
            'password'          => 'password',
            'role'              => 'admin',
            'email_verified_at' => now(),
        ]);

        User::firstOrcreate([
            'name'              => 'Candidat Test',
            'email'             => 'candidat@example.com',
            'password'          => 'password',
            'role'              => 'candidat',
            'email_verified_at' => now(),
        ]);

        User::factory(10)->create();

        OffreEmploi::factory(50)->create();

        Candidature::factory(25)->create();
    }
}
