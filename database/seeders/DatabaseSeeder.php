<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->create([
            'name' => 'Chris',
            'email' => 'chris@admin.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Hanna',
            'email' => 'hanna@boss.com',
            'password' => Hash::make('12345678'),
            'role' => 'boss',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Adrian',
            'email' => 'adrian@boss.com',
            'password' => Hash::make('12345678'),
            'role' => 'boss',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Luis',
            'email' => 'luis@user.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Alex',
            'email' => 'alex@user.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);

        $this->call([
            DepartamentoSeeder::class
        ]);
    }
}
