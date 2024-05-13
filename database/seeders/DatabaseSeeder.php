<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Clase;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)
        ->has(Clase::factory()
        ->has(Tarea::factory()->count(3))
        ->count(3), 'mis_clases')
        ->create();

        User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
