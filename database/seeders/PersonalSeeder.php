<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Personal();
        $p->nombre = 'Mauricio';
        $p->email = 'Mauricio@gmail.com';
        $p->password = 'password';
        $p->id_departamento = 1;
        $p->save();
    }
}
