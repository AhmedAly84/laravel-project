<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\About;
use App\Models\Brand;
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
    $brands = Brand::all();
    $abouts = About::all();
    return view('home', compact('brands','abouts'));
});
//for category route
Route::get('category/all', [CategoryController::class, 'allCat'])->name('category.all');
Route::post('category/add', [CategoryController::class, 'addCat'])->name('category.add');

Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);
Route::get('category/softdelet/{id}', [CategoryController::class, 'SoftDelet']);
Route::get('category/delet/{id}', [CategoryController::class, 'Delet']);
Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);
Route::post('category/update/{id}', [CategoryController::class, 'Update']);
//for brand route
Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('brand.all');
Route::post('brand/add', [BrandController::class, 'addBrand'])->name('brand.add');
Route::get('brand/edit/{id}', [BrandController::class, 'Edit']);
Route::get('brand/delete/{id}', [BrandController::class, 'Delete']);
Route::post('brand/update/{id}', [BrandController::class, 'Update']);
//for Muli Image
Route::get('images/all', [BrandController::class, 'MultiPic'])->name('multi.image');
Route::post('images/add', [BrandController::class, 'AddImages'])->name('image.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::paginate(4);
    return view('admin.index', compact('users'));
})->name('dashboard');
Route::get('user/logout', [BrandController::class, 'Logout'])->name('user.logout');
//All Admin Route
Route::get('home/slider', [HomeController::class, 'AllSlider'])->name('home.slider');
Route::get('home/slider/new', [HomeController::class, 'NewSlider'])->name('slider.new');
Route::post('home/slider/add', [HomeController::class, 'AddSlider'])->name('slider.add');
Route::get('slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('slider/update/{id}', [HomeController::class, 'Update']);
Route::get('slider/delete/{id}', [HomeController::class, 'Delete']);

//About Route
Route::get('home/about', [HomeController::class, 'About'])->name('home.about');
Route::get('home/about/new', [HomeController::class, 'NewAbout'])->name('about.new');
Route::post('home/about/add', [HomeController::class, 'AddData'])->name('about.add');
Route::get('about/edit/{id}', [HomeController::class, 'EditAbout']);
Route::post('about/update/{id}', [HomeController::class, 'UpdateAbout']);
Route::get('about/delete/{id}', [HomeController::class, 'DeleteAbout']);

