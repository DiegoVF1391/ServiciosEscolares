<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new Departamento();
        $d->nombre = 'Mantenimiento';
        $d->save();

        $d2 = new Departamento();
        $d2->nombre = 'IT';
        $d2->save();
    
        /**\App\Models\Departamento::factory()->create([
            'id_departamento' => '1',
            'nombre' => 'Mantenimiento',
        ]);*/
    }
}
