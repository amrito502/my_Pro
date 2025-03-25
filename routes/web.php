<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\ProductSliderController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Admin\SellerRequestController;
use App\Http\Controllers\Seller\SellerProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});





Route::middleware(['auth', 'ensurePhoneVerified'])->group(function () {
    Route::middleware('customer')->group(function () {

        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::post('/customer/update/profile/{id}', [CustomerController::class, 'customer_update_profile'])->name('customer_update.profile');
        Route::get('/customer/update/profile/page', [CustomerController::class, 'customer_update_profile_page'])->name('customer_update_profile_page');
        Route::post('/customer/update/password/{id}', [CustomerController::class, 'customer_update_password'])->name('customer_update_password');
        Route::get('/customer/update/password/page', [CustomerController::class, 'customer_update_password_page'])->name('customer_update_password_page');
        Route::get('/customer/my_order/page', [CustomerController::class, 'customer_my_order_page'])->name('customer_my_order_page');




        // Route::get('/customer/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');

        Route::get('/seller/request', [SellerRequestController::class, 'create'])->name('seller.request.create');
        Route::post('/seller/request', [SellerRequestController::class, 'store'])->name('seller.request.store');
    });















    Route::middleware('seller')->group(function () {
        Route::get('/seller/dashboard', [SellerController::class, 'sellerDashboard'])->name('seller.dashboard');
        Route::resource('sellerproducts', SellerProductController::class);
        Route::get('seller/product/edit/{id}', [SellerProductController::class, 'seller_product_edit'])->name('seller_product.edit');
        Route::post('seller/product/update/{id}', [SellerProductController::class, 'seller_product_update'])->name('seller_product.update');
        Route::get('seller/product/show/{id}', [SellerProductController::class, 'seller_product_show'])->name('seller_product.show');
        Route::get('seller/product/delete/{id}', [SellerProductController::class, 'seller_product_delete'])->name('seller_product.delete');
        Route::get('/get-seller-subcategories', [SellerProductController::class, 'getsellerSubCategories'])->name('getseller.subcategories');
        Route::get('/get-seller-subdistricts', [SellerProductController::class, 'getsellerSubDistricts'])->name('getseller.subdistricts');

        Route::get('/seller/order', [SellerOrderController::class, 'seller_order'])->name('seller.order');
        Route::get('/seller/sales/report', [SellerOrderController::class, 'seller_sales_report'])->name('seller_sales_report');
        Route::get('/seller/order/details/{id}', [SellerOrderController::class, 'seller_order_details'])->name('seller_order_details');

        Route::patch('/seller/order/{orderId}/update-status', [SellerOrderController::class, 'updateOrderStatus'])->name('seller.updateOrderStatus');
        Route::patch('/seller/orders/{order}/payment-status', [SellerOrderController::class, 'updatePaymentStatus'])->name('seller.updatePaymentStatus');
        Route::get('/seller/update-request', [SellerController::class, 'sellerupdateRequest_page'])->name('sellerupdateRequest_page');
        Route::patch('/seller/update-store', [SellerController::class, 'updateSellerRequest'])->name('seller.updateRequest');
        Route::get('/store/details', [SellerController::class, 'store_details'])->name('store_details');


        Route::post('/seller/update/profile/{id}', [SellerController::class, 'seller_update_profile'])->name('seller_update_profile');
        Route::get('/seller/update/profile/page', [SellerController::class, 'seller_update_profile_page'])->name('seller_update_profile_page');
    });













    Route::middleware('admin')->group(function () {
        // Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        // =====seller-requests=====
        Route::get('/admin/seller-requests', [SellerRequestController::class, 'index'])->name('admin.seller.requests');
        Route::post('/admin/seller-requests/{id}/approve', [SellerRequestController::class, 'verified'])->name('admin.seller.requests.approve');
        Route::post('/admin/seller-requests/{id}/reject', [SellerRequestController::class, 'canceled'])->name('admin.seller.requests.reject');
        // =========users-status=====
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/admin/users/{id}/block', [AdminController::class, 'blockUser'])->name('admin.users.block');
        Route::post('/admin/users/{id}/unblock', [AdminController::class, 'unblockUser'])->name('admin.users.unblock');


        // =================================
        Route::resource('brands', BrandController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('colors', ColorController::class);
        Route::resource('sizes', SizeController::class);

        Route::resource('products', ProductController::class);
        Route::get('/get-subcategories', [ProductController::class, 'getSubCategories'])->name('get.subcategories');

        Route::resource('coupons', CouponController::class);


        Route::resource('blog_categories', BlogCategoryController::class);
        Route::resource('blogs', BlogController::class);

        Route::get('/contact/admin', [ContactController::class, 'admin_message_show'])->name('admin_message_show');
        Route::get('/contact/admin/delete/{id}', [ContactController::class, 'admin_message_delete'])->name('admin_message_delete');

        Route::get('/admin/order/reports', [OrderController::class, 'admin_order_reports'])->name('admin_order_reports');

        Route::get('/admin/subscribe/reports', [CustomerController::class, 'admin_subscribe_reports'])->name('admin_subscribe_reports');

        Route::get('/admin/subscribe/delete/{id}', [CustomerController::class, 'admin_subscribe_delete'])->name('admin_subscribe_delete');


        Route::get('admin/user/index',[AdminController::class,'admin_user_index'])->name('admin_user_index');
        Route::post('admin/user/update/{id}',[AdminController::class,'admin_user_update'])->name('admin_user_update');
        Route::resource('product_sliders', ProductSliderController::class);

        Route::resource('companies', CompanyController::class);



        Route::get('admin/all-customer/show',[CustomerController::class,'all_customer_list'])->name('all_customer_list');
        Route::get('admin/all-seller/show',[CustomerController::class,'all_seller_list'])->name('all_seller_list');
        Route::get('admin/customer/delete/{id}',[CustomerController::class,'admin_customer_delete'])->name('admin_customer_delete');
        Route::get('admin/seller/delete/{id}',[CustomerController::class,'admin_seller_delete'])->name('admin_seller_delete');





        Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::delete('/permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');


        Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/destroy', [RoleController::class, 'destroy'])->name(name: 'roles.destroy');

        Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});














// Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
//     Route::match(['get','post'],'login', [AdminController::class, 'admin_login'])->name('admin.login');

// });







// Route::group(['middleware'=>['admin']], function(){
//     Route::get('admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
// });





// ====================without login==============================

Route::get('/', [CustomerController::class, 'index'])->name('home.page');
Route::get('/product-details/{id}', [CustomerController::class, 'product_details'])->name('product_details.page');


Route::get('/contact', [ContactController::class, 'contact_page'])->name('contact_page');
Route::post('/contact/store', [ContactController::class, 'contact_store'])->name('contact_store');
Route::post('/subscribe/newsletter', [CustomerController::class, 'subscribe_newsletter'])->name('subscribe_newsletter');


Route::get('/search', [SearchController::class, 'search'])->name('search');




Route::get('/products-by-location', [LocationController::class, 'productShowByLocation'])->name('product_distruct');
Route::get('/products-by-location/details/{id}', [LocationController::class, 'productShowByLocation_details'])->name('product_distruct.details');




Route::get('/nearby-products', [LocationController::class, 'showNearbyProducts']);
Route::get('/search-products', [LocationController::class, 'showSearchForm'])->name('products.search.form');
Route::get('/search-products/results', [LocationController::class, 'search'])->name('products.search');

Route::get('{category?}/{subcategory?}',[CustomerController::class,'getCategorySub']);

// cart==========

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');


Route::post('/cart/increase/{rowId}', [CartController::class, 'increase_cart_quantity'])->name('cart.increase');
Route::post('/cart/decrease/{rowId}', [CartController::class, 'decrease_cart_quantity'])->name('cart.decrease');

Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove_cart_item'])->name('cart.remove');
Route::delete('/cart/destroy', [CartController::class, 'destroy_cart'])->name('cart.destroy');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add_to_wishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{rowId}', [WishlistController::class, 'remove_wishlist_item'])->name('wishlist.remove');
Route::delete('/wishlist/destroy', [WishlistController::class, 'destroy_wishlist'])->name('wishlist.destroy');
Route::post('/wishlist/move-to-cart/{rowId}', [WishlistController::class, 'move_to_cart'])->name('wishlist.move_to_cart');

Route::post('/apply-coupon-code', [CartController::class, 'apply_coupon_code'])->name('apply.coupon.code');
Route::delete('/remove-coupon-code', [CartController::class, 'remove_coupon_code'])->name('remove.coupon.code');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'place_an_order'])->name('store.checkout');
Route::get('/order/success', [CartController::class, 'order_confirmation'])->name('order.success');

Route::get('/order/{id}/download-pdf', [OrderController::class, 'downloadPDF'])->name('order.download.pdf');




// ================================================================


// vendor==================

Route::get('/vendor/store/list', [SellerController::class, 'vendor_list'])->name('vendor_list');
Route::get('/vendor/store/{id}', [SellerController::class, 'vendor_store'])->name('vendor_store');


// ====blog=========
Route::get('/my-blog', [BlogController::class, 'blog_list_front'])->name('blog_list_front');
Route::get('/blog/details/{id}', [BlogController::class, 'blog_details_front'])->name('blog_details_front');




// ===========Start-Auth-routes==============================
Route::get('/get-subdistricts', [AuthController::class, 'getSubDistricts'])->name('get.subdistricts');
Route::get('/customer/register', [AuthController::class, 'register'])->name('customer.register');
Route::post('/customer/register/store', [AuthController::class, 'register_store'])->name('customer.register.store');
Route::get('/verify-phone', [AuthController::class, 'verify_phone'])->name('verify.phone');
Route::post('/verify-phone-store', [AuthController::class, 'verify_phone_store'])->name('verify.phone.store');
Route::post('/resend-otp', [AuthController::class, 'resend_otp'])->name('otp.resend');
// ========login========

Route::post('/customer/login', [AuthController::class, 'login_store'])->name('login.store');
// ===========End-Auth-routes==============================



















require __DIR__ . '/auth.php';
