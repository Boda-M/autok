<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CarModel;

class CarModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_view_car_model_index(){

        CarModel::factory()->count(3)->create();

        $response = $this->get(route('carModels'));

        $response->assertStatus(200);

        $response->assertViewHas('entities');

    }

    public function test_user_can_create_car_model(){
        $makerData = ['name' => 'New Maker'];
        $response = $this->post(route('makers/store'), $makerData);

        $modelData = ['name' => 'New model', 'idMaker'=>1];

        $response = $this->post(route('carModels/store'), $modelData);

        $response->assertRedirect(route("carModels"));

        $this->assertDatabaseHas('car_models', $modelData);
        $response->assertSessionHas('success', 'car model created');
    }

    public function test_user_can_update_carmodels(){
        $model=CarModel::factory()->create();
       
        $this->post(route("makers/store"),['name'=>'New Maker']);

        $updatedData=['name'=>'Updated Model','idMaker'=>"1"];
        $response=$this->patch(route("carModels/update",$model->id),$updatedData);
 
        $this->assertDatabaseHas("car_models",$updatedData);
        $response->assertRedirect(route("carModels"));
        $response->assertSessionHas("success","car model edited");
    }

    public function test_user_can_delete_model(){
        $maker = CarModel::factory()->create();
        
        $response = $this->delete(route('carModels/destroy', $maker->id));

        $this->assertDatabaseMissing('car_models', ['id' => $maker->id]);
    }
}
