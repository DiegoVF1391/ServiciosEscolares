<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $p->email = 'mauricio@gmail.com';
        $p->password = 'password';
        $p->id_departamento = 1;
        $p->save();
    }
}
