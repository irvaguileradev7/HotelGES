<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role;
        $role1->user_category = 1;
        $role1->user_role_type = "Administrador de IT";
        $role1->save();

        $role2 = new Role;
        $role2->user_category = 2;
        $role2->user_role_type = "Gerente de hotel";
        $role2->save();

        $role3 = new Role;
        $role3->user_category = 3;
        $role3->user_role_type = "Operador";
        $role3->save();
    }
}
