<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserControllerValidationsTest extends TestCase
{
    public function test_ruta(){
        $response = $this->get('/users/create');

        $response->assertStatus(302);

    }

    public function test_agregar_nuevo_usuario_5_chars()
    {
        $user = User::first();

        $this->actingAs($user);

        $user1 = [
            'name' => 'Juan Soler',
            'email' => 'juanSol@example.com',
            'password' => 'carro!M0',
            'role_id' => '1'
        ];

        $response = $this->post('/users', $user1);
        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));

        unset($user1['password']);

        $this->assertDatabaseHas('users', $user1);

        $user2 = [
            'name' => 'mia',
            'email' => 'mia29l@example.com',
            'password' => 'perroR0&',
            'role_id' => '1'
        ];

        $response = $this->post('/users', $user2);
        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', $user2);
    }

}
