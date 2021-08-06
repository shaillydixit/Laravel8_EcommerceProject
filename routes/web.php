<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\Backend\SubcategoryController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//category
Route::get('/category/view', [CategoryController::class, 'AllCategory'])->name('all.category');
Route::post('/category/store', [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

//brand
Route::get('/brand/view', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/store', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand'])->name('edit.brand');
Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand'])->name('update.brand');
Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');

//subcategory
Route::get('/subcategory/view', [SubcategoryController::class, 'AllSubCategory'])->name('all.subcategory');
Route::post('/subcategory/store', [SubcategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
Route::post('/subcategory/update/{id}', [SubcategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');
