<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;
Use Illuminate\Support\Facades\Auth;

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
    return view('home');
});
Route::get('login',[AdminController::class,'index'])->name('login');
Route::get('registration',[UsersController::class,'index'])->name('registration');
Route::post('user/registration',[UsersController::class,'register'])->name('user.registration');
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

// Route::get('admin/dashboard',[AdminController::class,'dashboard']);

Route::group(['middleware'=>'admin_auth'],function(){
	Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
	Route::get('user/dashboard',[UsersController::class,'dashboard'])->name('user.dashboard');
	Route::get('admin/category',[CategoryController::class,'index']);
	Route::get('admin/manage_category',[CategoryController::class,'manage_category']);
	Route::post('admin/manage_category',[CategoryController::class, 'saveCategory'])->name('save.category');
	Route::get('admin/edit-category/{id}',[CategoryController::class, 'editCategory'])->name('category.edit');
	Route::post('admin/update-category',[CategoryController::class, 'updateCategory'])->name('update.category');
	Route::get('admin/delete-category/{id}',[CategoryController::class, 'deleteCategory'])->name('category.delete');
	Route::get('admin/category/status/{status}/{id}',[CategoryController::class, 'status'])->name('status.update');
	Route::get('admin/subcategory',[SubCategoryController::class,'index']);
	Route::get('admin/manage_subcategory',[SubCategoryController::class,'manage_subcategory']);
	Route::post('admin/manage_subcategory',[SubCategoryController::class, 'saveSubCategory'])->name('save.subcategory');
	Route::get('admin/edit-subcategory/{id}',[SubCategoryController::class, 'editSubCategory'])->name('subcategory.edit');
	Route::post('admin/update-subcategory',[SubCategoryController::class, 'updateSubCategory'])->name('update.subcategory');
	Route::get('admin/delete-category/{id}',[SubCategoryController::class, 'deleteSubCategory'])->name('category.delete');
	Route::get('admin/category/status/{status}/{id}',[SubCategoryController::class, 'status'])->name('status.update');
	Route::get('admin/coupon',[CouponController::class,'index']);
	Route::get('admin/manage_coupon',[CouponController::class,'manage_coupon']);
	Route::post('admin/manage_coupon',[CouponController::class, 'saveCoupon'])->name('save.coupon');
	Route::get('admin/edit-coupon/{id}',[CouponController::class, 'editCoupon'])->name('coupon.edit');
	Route::get('admin/delete-coupon/{id}',[CouponController::class, 'deleteCoupon'])->name('coupon.delete');
	Route::post('admin/update-coupon',[CouponController::class, 'updateCoupon'])->name('update.coupon');
	
	Route::get('admin/coupon/status/{status}/{id}',[CouponController::class, 'status'])->name('status.update');
	
	Route::get('admin/logout', function () 
		{
			session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            // return redirect('admin');
            return redirect('/');
		});
});
	