<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
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

Route::get('test', function () {
    Log::info('test');
    echo 'wwwww';
});

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
Route::get('/product/manage', [ProductController::class, 'ManageProduct'])->name('manage.product');
Route::get('/product/edit/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::get('image/delete/{id}', [ProductController::class, 'DeleteProductImage'])->name('product.multiimage.delete');
Route::post('/product/update/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
Route::post('/image/update', [ProductController::class, 'UpdateProductImage'])->name('update.product.image');
Route::get('/product/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('inactive.product');
Route::get('/product/active/{id}', [ProductController::class, 'ActiveProduct'])->name('active.product');
Route::get('/product/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');


//slider
Route::get('/slider/manage', [SliderController::class, 'ManageSlider'])->name('manage.slider');
Route::post('/slider/store', [SliderController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/inactive/{id}', [SliderController::class, 'InactiveSlider'])->name('inactive.slider');
Route::get('/slider/active/{id}', [SliderController::class, 'ActiveSlider'])->name('active.slider');
Route::get('/slider/edit/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
Route::post('/slider/update/{id}', [SliderController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/slider/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');

//user all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/payment', [IndexController::class, 'UserPayment'])->name('user.payment');
Route::get('/user/orders', [IndexController::class, 'UserOrders'])->name('user.orders');
Route::get('/user/address', [IndexController::class, 'UserAddress'])->name('user.address');

//product details

Route::get('/product/details/{id}', [IndexController::class, 'ProductDetails']);
Route::get('/product/grid', [IndexController::class, 'ProductGrid'])->name('product.grid');
Route::get('/product/list', [IndexController::class, 'ProductList'])->name('product.list');
Route::get('/product/tags/{tag}', [IndexController::class, 'ProductTagWise']);
Route::get('/product/categories', [IndexController::class, 'ProductCategories'])->name('product.categories');
