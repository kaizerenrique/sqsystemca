<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Personas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/personas',Personas::class)->name('personas'); //listado de personas
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});