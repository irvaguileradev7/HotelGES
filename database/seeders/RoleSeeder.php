<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = new Role;
        $rol1->RoleTipe = 'Administrador de IT';
        $rol1->save();

        $rol2 = new Role;
        $rol2->RoleTipe = 'Gerente Hotel';
        $rol2->save();

        $rol3 = new Role;
        $rol3->RoleTipe = 'Operador';
        $rol3->save();
    }
}
