<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Karosszeria;

class KarosszeriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_karosszeriak_index(){

        Karosszeria::factory()->count(3)->create();

        $response = $this->get(route('karosszeriak'));

        $response->assertStatus(200);

        $response->assertViewHas('entities');

    }

    public function test_user_can_create_karosszeria(){
        $makerData = ['name' => 'New karosszeria'];

        $response = $this->post(route('karosszeriak/store'), $makerData);

        $response->assertRedirect(route('karosszeriak'));

        $this->assertDatabaseHas('karosszeriak', $makerData);
        $response->assertSessionHas('success', 'sikeres létrehozás');
    }


    public function test_user_can_update_maker(){
        $maker = Karosszeria::factory()->create();
        $updatedData = ['name' => 'Updated karosszeria'];
        $response = $this->patch(route('karosszeriak/update', $maker->id), $updatedData);

        $response->assertRedirect(route('karosszeriak'));
        $this->assertDatabaseHas('karosszeriak', $updatedData);

        $response->assertSessionHas('success', 'Karosszéria módosítva');
    }

    public function test_user_can_delete_maker(){
        $karosszeria = Karosszeria::factory()->create();
        
        $response = $this->delete(route('karosszeriak/destroy', $karosszeria->id));

        $this->assertDatabaseMissing('karosszeriak', ['id' => $karosszeria->id]);
    }
}
