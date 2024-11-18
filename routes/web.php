<?php

use App\Http\Controllers\CarModelController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FuelsContoller;
use App\Http\Controllers\KarosszeriaController;
use App\Http\Controllers\SebvaltoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::post("makers/store",[MakerController::class,"store"])->name("makers/store");
Route::delete("makers/{id}",[MakerController::class,"destroy"])->name('makers/destroy');
Route::post("makers/{id}",[MakerController::class,"edit"])->name('makers/edit');
Route::patch('makers/{id}', [MakerController::class, 'update'])->name('makers/update');
Route::get('makers/{letter}', [MakerController::class, 'index2'])->name('makers.letter');

Route::get("fuels",[FuelsContoller::class,"index"])->name("fuels");
Route::post("fuels/store",[FuelsContoller::class,"store"])->name("fuels/store");
Route::delete("fuels/{id}",[FuelsContoller::class,"destroy"])->name('fuels/destroy');
Route::post("fuels/{id}",[FuelsContoller::class,"edit"])->name('fuels/edit');
Route::patch('fuels/{id}', [FuelsContoller::class, 'update'])->name('fuels/update');
//Route::put()

Route::get("karosszeriak",[KarosszeriaController::class,"index"])->name("karosszeriak");
Route::post("karosszeriak/store",[KarosszeriaController::class,"store"])->name("karosszeriak/store");
Route::delete("karosszeriak/{id}",[KarosszeriaController::class,"destroy"])->name('karosszeriak/destroy');
Route::post("karosszeriak/{id}",[KarosszeriaController::class,"edit"])->name('karosszeriak/edit');
Route::patch('karosszeriak/{id}', [KarosszeriaController::class, 'update'])->name('karosszeriak/update');

Route::get("sebvaltok",[SebvaltoController::class,"index"])->name("sebvaltok");
Route::post("sebvaltok/store",[SebvaltoController::class,"store"])->name("sebvaltok/store");
Route::delete("sebvaltok/{id}",[SebvaltoController::class,"destroy"])->name('sebvaltok/destroy');
Route::post("sebvaltok/{id}",[SebvaltoController::class,"edit"])->name('sebvaltok/edit');
Route::patch('sebvaltok/{id}', [SebvaltoController::class, 'update'])->name('sebvaltok/update');

Route::get("colors",[ColorController::class,"index"])->name("colors");
Route::post("colors/store",[ColorController::class,"store"])->name("colors/store");
Route::delete("colors/{id}",[ColorController::class,"destroy"])->name('colors/destroy');
Route::post("colors/{id}",[ColorController::class,"edit"])->name('colors/edit');
Route::patch('colors/{id}', [ColorController::class, 'update'])->name('colors/update');

Route::get("carModels",[CarModelController::class,"index"])->name("carModels");
Route::post("carModels/store",[CarModelController::class,"store"])->name("carModels/store");
Route::delete("carModels/{id}",[CarModelController::class,"destroy"])->name('carModels/destroy');
Route::post("carModels/edit/{id}",[CarModelController::class,"edit"])->name('carModels/edit');
Route::patch('carModels/{id}', [CarModelController::class, 'update'])->name('carModels/update');
Route::get('carModels/{idMaker}', [CarModelController::class, 'index2'])->name('carModels.idMaker');
