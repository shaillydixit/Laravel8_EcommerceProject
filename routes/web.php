<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CoupanController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShippingController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;

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


//product details

Route::get('/product/details/{id}', [IndexController::class, 'ProductDetails']);
Route::get('/product/grid', [IndexController::class, 'ProductGrid'])->name('product.grid');
Route::get('/product/list', [IndexController::class, 'ProductList'])->name('product.list');
Route::get('/product/tags/{tag}', [IndexController::class, 'ProductTagWise']);
Route::get('/product/categories', [IndexController::class, 'ProductCategories'])->name('product.categories');

//subcategorieswise data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'ProductSubcategoryWise']);

//subsubcategorieswise data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'ProductSubsubcategoryWise']);

//brandwise data
Route::get('/brand/product/{brand_id}', [IndexController::class, 'ProductBrandwise']);

//productviewmodel
Route::get('/product/view/model/{id}', [IndexController::class, 'ProductViewAjax']);

//add to cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

Route::get('/minicart/product/remove/{id}', [CartController::class, 'RemoveMiniCart']);

//wishlist
Route::post('/add/wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('/product/wishlist/', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get/wishlist', [WishlistController::class, 'GetWishlist']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    Route::get('/logout', [AllUserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/profile', [AllUserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/payment', [AllUserController::class, 'UserPayment'])->name('user.payment');
    Route::get('/orders', [AllUserController::class, 'UserOrders'])->name('user.orders');
    Route::get('/returned/orders', [AllUserController::class, 'ReturnedOrders'])->name('returned.orders');
    Route::get('/cancelled/orders/list', [AllUserController::class, 'CancelledOrdersList'])->name('cancelled.orders.list');
    Route::get('/address', [AllUserController::class, 'UserAddress'])->name('user.address');

    Route::get('/order-details/{order_id}', [AllUserController::class, 'OrderDetails']);

    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    Route::get('/invoice-download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    Route::post('/return-order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
});

//cart
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/cart-remove/{rowId}', [CartPageController::class, 'CartRemove']);

Route::get('/cart/increment/{rowId}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart/decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

//coupans backend

Route::get('/coupans/manage', [CoupanController::class, 'ManageCoupan'])->name('manage.coupans');
Route::post('/coupans/store', [CoupanController::class, 'StoreCoupan'])->name('store.coupan');
Route::get('/coupans/edit/{id}', [CoupanController::class, 'EditCoupan'])->name('edit.coupan');
Route::post('/coupans/update/{id}', [CoupanController::class, 'UpdateCoupan'])->name('update.coupan');
Route::get('/coupans/delete/{id}', [CoupanController::class, 'DeleteCoupan'])->name('delete.coupan');


//shipping backend
Route::get('/manage/shipping/division', [ShippingController::class, 'ManageDivision'])->name('manage.division');
Route::post('/store/shipping/division', [ShippingController::class, 'StoreDivision'])->name('store.division');
Route::get('/edit/shipping/division/{id}', [ShippingController::class, 'EditDivision'])->name('edit.division');
Route::post('/update/shipping/division/{id}', [ShippingController::class, 'UpdateDivision'])->name('update.division');
Route::get('/delete/shipping/division/{id}', [ShippingController::class, 'DeleteDivision'])->name('delete.division');

//district
Route::get('/manage/shipping/district', [ShippingController::class, 'ManageDistrict'])->name('manage.district');
Route::post('/store/shipping/district', [ShippingController::class, 'StoreDistrict'])->name('store.district');
Route::get('/edit/shipping/district/{id}', [ShippingController::class, 'EditDistrict'])->name('edit.district');
Route::post('/update/shipping/district/{id}', [ShippingController::class, 'UpdateDistrict'])->name('update.district');
Route::get('/delete/shipping/district/{id}', [ShippingController::class, 'DeleteDistrict'])->name('delete.district');

//state
Route::get('/manage/shipping/state', [ShippingController::class, 'ManageState'])->name('manage.state');
Route::post('/store/shipping/state', [ShippingController::class, 'StoreState'])->name('store.state');
Route::get('/division/district/ajax/{division_id}', [ShippingController::class, 'GetDistrict']);
Route::get('/edit/shipping/state/{id}', [ShippingController::class, 'EditState'])->name('edit.state');
Route::post('/update/shipping/state/{id}', [ShippingController::class, 'UpdateState'])->name('update.state');
Route::get('/delete/shipping/state/{id}', [ShippingController::class, 'DeleteState'])->name('delete.state');

//frontend coupan
Route::post('/coupan-apply', [CartController::class, 'CoupanApply']);
Route::get('/coupan-calculation', [CartController::class, 'CoupanCalculation']);
Route::get('/coupan-remove', [CartController::class, 'CoupanRemove']);

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store/data', [CheckoutController::class, 'CheckoutStore'])->name('checkout.storedata');

//orders backend
Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending.orders');
Route::get('/pending/order/details/{order_id}', [OrderController::class, 'PendingOrderDetails'])->name('pending.order.details');
Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed.orders');
Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing.orders');
Route::get('/pickedup/orders', [OrderController::class, 'PickedUpOrders'])->name('pickedup.orders');
Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped.orders');
Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered.orders');
Route::get('/cancelled/orders', [OrderController::class, 'CancelledOrders'])->name('cancelled.orders');

// status update
Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingConfirm'])->name('pending.confirm');
Route::get('/confirm/processing{order_id}', [OrderController::class, 'ConfirmProcessing'])->name('confirm.processing');
Route::get('/processing/pickedup/{order_id}', [OrderController::class, 'ProcessingPickedup'])->name('processing.pickedup');
Route::get('/pickedup/shipped/{order_id}', [OrderController::class, 'PickedupShipped'])->name('pickedup.shipped');
Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedDelivered'])->name('shipped.delivered');

// confirmed order Invoice Download
Route::get('/invoice/download/{order_id}', [OrderController::class, 'InvoiceDownload'])->name('invoice.download');


// backend reports

Route::get('all.reports', [ReportController::class, 'AllReports'])->name('all.reports');
Route::post('/search/by/date', [ReportController::class, 'SearchByDate'])->name('search.by.date');
Route::post('/search/by/month', [ReportController::class, 'SearchByMonth'])->name('search.by.month');
Route::post('/search/by/year', [ReportController::class, 'SearchByYear'])->name('search.by.year');

// users in admin backend

Route::get('/all/users', [AdminProfileController::class, 'AllUsers'])->name('all.users');
