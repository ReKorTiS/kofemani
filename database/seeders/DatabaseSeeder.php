<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Семёнов',
            'lastname' => 'Аркадий',
            'patronymic' => 'Ярославович',
            'is_admin' => true,
            'login' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'kofeman',
        ]);
        User::factory()->create([
            'firstname' => 'Семёнов',
            'lastname' => 'Аркадий',
            'patronymic' => 'Ярославович',
            'is_admin' => false,
            'login' => 'manager1',
            'email' => 'manager1@example.com',
            'password' => 'manager2026',
        ]);
        User::factory()->create([
            'firstname' => 'Семёнов',
            'lastname' => 'Аркадий',
            'patronymic' => 'Ярославович',
            'is_admin' => false,
            'login' => 'manager2',
            'email' => 'manager2@example.com',
            'password' => 'manager20262',
        ]);
    }
}
