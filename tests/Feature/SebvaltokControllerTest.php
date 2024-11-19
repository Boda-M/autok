<?php
 
namespace Tests\Feature;
 
use App\Models\Fuel;
use App\Models\Sebvalto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
 
class SebvaltokControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
 
    public function test_user_can_view_sebvaltok_index(){
        Sebvalto::factory()->count(3)->create();
 
        $response=$this->get(route("sebvaltok"));
        $response->assertStatus(200);
        $response->assertViewHas("entities");
    }
   
    public function test_user_can_create_sebvaltok(){
       
        $sebvaltoData=['name'=>'New Sebváltó'];
 
        $response=$this->post(route("sebvaltok/store"),$sebvaltoData);
 
        $response->assertRedirect(route("sebvaltok"));
 
        $this->assertDatabaseHas("sebvaltok",$sebvaltoData);
        $response->assertSessionHas("success","Sebváltó ltrehozva");
    }
    public function test_user_can_update_sebvaltok(){
        $sebvalto=Sebvalto::factory()->create();
 
        $updatedData=['name'=>'Updated Sebváltó'];
 
        $response=$this->patch(route("sebvaltok/update",$sebvalto->id),$updatedData);
 
        $this->assertDatabaseHas("sebvaltok",$updatedData);
 
        $response->assertRedirect(route("sebvaltok"));
        $response->assertSessionHas("success","Sebváltó módosítva");
    }
 
    public function test_user_can_delete_sebvaltok() {
        $sebvalto=Sebvalto::factory()->create();
 
        $response=$this->delete(route("sebvaltok/destroy",$sebvalto->id));
 
        $this->assertDatabaseMissing("sebvaltok",["id"=>$sebvalto->id]);
       
        $response->assertRedirect(route("sebvaltok"));
        $response->assertSessionHas("success","sebvalto törölve");
    }
}
 