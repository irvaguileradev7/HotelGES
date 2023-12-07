<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

    public function test_agregar_nuevo_usuario()
    {
        // Asegúrate de que la tabla 'users' esté vacía antes de crear un nuevo usuario
        $this->assertDatabaseCount('users', 0);

        // Crea un nuevo usuario
        User::factory()->create();

        // Verifica que ahora haya un solo registro en la tabla 'users'
        $this->assertDatabaseCount('users', 1);
    }

    public function test_agregar_diez_usuarios(){
        $this->assertDatabaseCount('users', 1);

        User::factory()->count(10)->create();

        $this->assertDatabaseCount('users',11);
    }

    public function test_identificar_usuario_por_id(){
        $this->assertDatabaseHas('users', [
            'id' => '1'
        ]);

        $this->assertDatabaseMissing('users', [
            'id' => '12'
        ]);
    }

    public function test_modificar_usuario(){
        $user= User::Find(1);
        $user->name = 'Jorge Alvarez';
        $user->save();

        $this->assertDatabaseHas('users', [
            'name' => 'Jorge Alvarez'
        ]);
    }

    public function test_modificar_mas_de_un_usuario(){
        User::where('role_id', 1)
            ->update(['role_id' => 3]);
        
        $this->assertDatabaseMissing('users', [
            'role_id' => 1
        ]);
    }

    public function test_eliminar_un_usuario(){
        $user =User::find(1);
        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => 1
        ]);
    }
    
    public function test_eliminar_varios_usuarios(){
        User::where('role_id', 3)
            ->delete();
        $this->assertDatabaseMissing('users', [
            'role_id' => 3
        ]);
    }
}
