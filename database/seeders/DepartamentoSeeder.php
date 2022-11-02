<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\User;
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
        $d-> id_encargado = 2;
        $d->save();

        $d2 = new Departamento();
        $d2->nombre = 'IT';
        $d2-> id_encargado = 3;
        $d2->save();

        //asociacon de usuarios con departamentos
        $usu = User::find(2);
        $usu->id_departamento = 1;
        $usu->save();

        $usu = User::find(3);
        $usu->id_departamento = 2;
        $usu->save();

        $usu = User::find(4);
        $usu->id_departamento = 1;
        $usu->save();

        $usu = User::find(5);
        $usu->id_departamento = 2;
        $usu->save();

        $usu = User::find(6);
        $usu->id_departamento = 1;
        $usu->save();

        $usu = User::find(7);
        $usu->id_departamento = 2;
        $usu->save();

        $usu = User::find(8);
        $usu->id_departamento = 1;
        $usu->save();

        $usu = User::find(9);
        $usu->id_departamento = 2;
        $usu->save();
    
        /**\App\Models\Departamento::factory()->create([
            'id_departamento' => '1',
            'nombre' => 'Mantenimiento',
        ]);*/
    }
}
