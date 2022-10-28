<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /**\App\Models\Personal::factory()->create([
            'nombre' => 'Mauricio',
            'email' => 'test@example.com',
            'password' => '12344as',
            'id_departamento' => '1',
        ]);*/
        \App\Models\User::factory()->create([
            'name' => 'Chris',
            'email' => 'chris@admin.com',
            'password' => '12345678',
            'role' => 'admin',
        ]);
    }
}
