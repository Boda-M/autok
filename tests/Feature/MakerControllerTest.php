<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Maker;

class MakerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /*public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }*/

    public function test_user_can_view_makers_index(){

        Maker::factory()->count(3)->create();

        $response = $this->get(route('makers'));

        $response->assertStatus(200);

        $response->assertViewHas('entities');

    }

    public function test_user_can_create_maker(){
        $makerData = ['name' => 'New Maker'];

        $response = $this->post(route('makers/store'), $makerData);

        $response->assertRedirect(route('makers'));

        $this->assertDatabaseHas('makers', $makerData);
        $response->assertSessionHas('success', 'sikeres létrehozás');
    }
}
