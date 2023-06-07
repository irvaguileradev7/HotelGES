<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role_id' => '1'
        ]);

        $user1 = User::create([
            'name' => 'Gerente',
            'email' => 'gerenteUsuario@example.com',
            'password' => Hash::make('gerente'),
            'role_id' => '2'
        ]);

        $user2 = User::create([
            'name' => 'Operario',
            'email' => 'operarioUsuario@example.com',
            'password' => Hash::make('operario'),
            'role_id' => '3'
        ]);

    }
}
