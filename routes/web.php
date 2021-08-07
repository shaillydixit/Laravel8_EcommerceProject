<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
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
Route::get('/category/brand/view', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/category/brand/store', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/category/brand/edit/{id}', [BrandController::class, 'EditBrand'])->name('edit.brand');
Route::post('/category/brand/update/{id}', [BrandController::class, 'UpdateBrand'])->name('update.brand');
Route::get('/category/brand/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');

//subcategory
Route::get('/category/subcategory/view', [SubcategoryController::class, 'AllSubCategory'])->name('all.subcategory');
Route::post('/category/subcategory/store', [SubcategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
Route::get('/category/subcategory/edit/{id}', [SubcategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
Route::post('/category/subcategory/update/{id}', [SubcategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
Route::get('/category/subcategory/delete/{id}', [SubcategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

//subsubcategory
Route::get('/category/subsubcategory/view', [SubSubCategoryController::class, 'AllSubSubCategory'])->name('all.subsubcategory');
Route::post('/category/subsubcategory/store', [SubSubCategoryController::class, 'StoreSubSubCategory'])->name('store.subsubcategory');
Route::get('/category/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
Route::get('/category/subsubcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
Route::get('/category/subsubcategory/edit/{id}', [SubSubCategoryController::class, 'EditSubSubCategory'])->name('edit.subsubcategory');
Route::post('/category/subsubcategory/update/{id}', [SubSubCategoryController::class, 'UpdateSubSubCategory'])->name('update.subsubcategory');
Route::get('/category/subsubcategory/delete/{id}', [SubSubCategoryController::class, 'DeleteSubSubCategory'])->name('delete.subsubcategory');

//product
Route::get('/product/add', [ProductController::class, 'AddProduct'])->name('add.product');
Route::get('/category/brand/ajax/{category_id}', [ProductController::class, 'GetBrand']);
Route::post('/product/store', [ProductController::class, 'StoreProduct'])->name('store.product');
