<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrecommandeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TableController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')
->name('login');

// Route::middleware('auth')->group(function(){
//     Route::get('/home',)->name('home');
// });

// Route::get('/', function () {
//     return view('login');
// });

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/produits',[ProductController::class,'index'])->name('products');
    Route::get('/categories',[CategorieController::class,'index'])->name('categories');
    Route::get('/tables',[TableController::class,'index'])->name('tables');
    Route::get('/precommandes',[PrecommandeController::class,'index'])->name('commandes');
    Route::get('/commande/{id}',[CommandeController::class,'new'])->name('new_commande');
    Route::get('/depenses',[DepenseController::class,'index'])->name('depenses');

    Route::get("/rapports",[RapportController::class,'index'])->name('rapports');
    Route::get("/dailyRapport",[RapportController::class,'daily'])->name('daily-rapport');
    Route::get("/weeklyRapport",[RapportController::class,'monthly'])->name('weekly-rapport');
    Route::get("/monthlyRapport",[RapportController::class,'monthly'])->name('monthly-rapport');

    Route::get('/dailyStock',[StockController::class,'daily'])->name("daily-stock");
    Route::get('/weeklyStock',[StockController::class,'weekly'])->name("weekly-stock");
    Route::get('/monthStock',[StockController::class,'monthly'])->name("monthly-stock");

    Route::get('/facture/{id}',[HomeController::class,'facture'])->name('facture');
});

require __DIR__.'/auth.php';