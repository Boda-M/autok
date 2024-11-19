<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Fuel;
 
class FuelControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_view_fuels_index()
    {
        Fuel::factory()->count(3)->create();
 
        $response = $this->get(route('fuels'));
 
        $response->assertStatus(200);
 
        $response->assertViewHas('entities');
    }
 
    public function test_user_can_create_fuels()
    {
        $fuelData = ['name' => 'New Fuel'];
        $response = $this->post(route('fuels/store'), $fuelData);
        $response->assertRedirect(route('fuels'));
        $this->assertDatabaseHas('fuels', $fuelData);
        $response->assertSessionHas('success', 'sikeres létrehozás');
    }
 
    public function test_user_can_update_fuels()
    {
        $fuel = Fuel::factory()->create();
        $updatedData = ['name' => 'Updated Fuel'];
        $response = $this->patch(route('fuels/update', $fuel->id), $updatedData);
        $response->assertRedirect(route('fuels'));
        $this->assertDatabaseHas('fuels', $updatedData);
        $response->assertRedirect(route('fuels'));
        $response->assertSessionHas('success', 'Üzemanyag módosítva.');
    }
 
    public function test_user_can_delete_fuels()
    {
        $fuel = Fuel::factory()->create();
        $response = $this->delete(route('fuels/destroy', $fuel->id));
        $this->assertDatabaseMissing('fuels', ['id' => $fuel->id]);
        $response->assertRedirect(route('fuels'));
        $response->assertSessionHas('success', 'Element deleted successfully.');
    }
}
 