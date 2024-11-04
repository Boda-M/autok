<?php

use App\Http\Controllers\FuelsContoller;
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
