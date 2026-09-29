<?php
use Illuminate\Support\Facades\Route; use App\Http\Controllers\RaceController;
Route::get('/',[RaceController::class,'home']);
Route::get('/join/{code}',[RaceController::class,'joinPage']);
Route::get('/races/{code}',[RaceController::class,'home']);
Route::post('/api/races',[RaceController::class,'create']);
Route::get('/api/races/{race:code}',[RaceController::class,'show']);
Route::post('/api/races/{race:code}/join',[RaceController::class,'join']);
Route::post('/api/races/{race:code}/start',[RaceController::class,'start']);
Route::post('/api/races/{race:code}/import',[RaceController::class,'import']);
