<?php

use App\Http\Controllers\CategoryController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('category/all', [CategoryController::class, 'allCat'])->name('category.all');
Route::post('category/add', [CategoryController::class, 'addCat'])->name('category.add');
Route::post('brand/all', [CategoryController::class, 'addCat'])->name('brand.add');
Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);
Route::get('category/softdelet/{id}', [CategoryController::class, 'SoftDelet']);
Route::get('category/delet/{id}', [CategoryController::class, 'Delet']);
Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);
Route::post('category/update/{id}', [CategoryController::class, 'Update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::paginate(4);
    return view('dashboard', compact('users'));
})->name('dashboard');
