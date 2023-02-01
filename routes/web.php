<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "getHome"])->name("/");

Route::get('catalog', [CatalogController::class, "getIndex"])->name("catalog")->middleware('auth');

Route::get('catalog/show/{id}', [CatalogController::class, "getShow"])->name("showCatalog")->middleware('auth');

Route::get('catalog/create', [CatalogController::class, "getCreate"])->name("createCatalog")->middleware('auth');
Route::post('catalog/create', [CatalogController::class, "postCreate"])->name("postCatalog")->middleware('auth');

Route::get('catalog/edit/{id}', [CatalogController::class, "getEdit"])->name("editCatalog")->middleware('auth');
Route::put('catalog/edit/{id}', [CatalogController::class, "putEdit"])->name("putCatalog")->middleware('auth');

Route::put('catalog/rent/{id}', [CatalogController::class, "putRent"])->name("putRent")->middleware('auth');
Route::put('catalog/return/{id}', [CatalogController::class, "putReturn"])->name("putReturn")->middleware('auth');
Route::delete('catalog/delete/{id}', [CatalogController::class, "deleteMovie"])->name("deleteMovie")->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
