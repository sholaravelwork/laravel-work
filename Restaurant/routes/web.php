<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

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

Route::get('/',[PostController::class, 'index'])
->name('manage.index');

Route::get('/foods',[PostController::class, 'sidebar_foods'])
->name('manage.foods');

Route::get('/drinks',[PostController::class, 'sidebar_drinks'])
->name('manage.drinks');

Route::get('/access',[PostController::class, 'sidebar_access'])
->name('access');

Route::get('/admin',[PostController::class, 'admin'])
->name('admin')->middleware('login');

Route::get('/manage-menu',[PostController::class, 'manage_menu'])
->name('manage.menu')->middleware('login');

Route::get('/menuadd',[PostController::class, 'menu_add'])
->name('menus.add')->middleware('login');

Route::post('/menus/store',[PostController::class, 'menu_store'])
->name('menus.store')->middleware('login');

Route::get('/menus/{menu}', [PostController::class, 'menus_show'])
    ->name('menus.show')->middleware('login');

Route::get('/menus/{menu}/edit', [PostController::class, 'menus_edit'])
    ->name('menus.edit')
    ->where('menu', '[0-9]+')->middleware('login');

Route::patch('/menus/{menu}/update', [PostController::class, 'update'])
    ->name('menus.update')
    ->where('menu', '[0-9]+')->middleware('login');

Route::get('/menus/{menu}/destroy', [PostController::class, 'destroy'])
    ->name('menus.destroy')
    ->where('menu', '[0-9]+')->middleware('login');


Route::get('/manage-reserve',[PostController::class, 'manage_reserve'])
    ->name('manage.reserve')->middleware('login');

// 予約追加画面
Route::post('/reserve/store',[ReserveController::class, 'reserve_store'])
    ->name('reserve.store')->middleware('login');


Route::get('/reserveadd',[ReserveController::class, 'reserve_add'])->middleware('login');


Route::get('/reserves/{reservation}', [ReserveController::class, 'reserve_show'])
    ->name('reserve.show')->middleware('login');


Route::get('/reserves/{reservation}/edit', [ReserveController::class, 'reserve_edit'])
    ->name('reserve.edit')
    ->where('reserve', '[0-9]+')->middleware('login');


Route::patch('/reserves/{reservation}/update', [ReserveController::class, 'reserveupdate'])
    ->name('reserve.update')
    ->where('reserve', '[0-9]+')->middleware('login');

Route::get('/reserves/{reservation}/destroy', [ReserveController::class, 'reservedestroy'])
    ->name('reserve.destroy')
    ->where('reserve', '[0-9]+')->middleware('login');

Route::get('/reserveck',[PostController::class, 'reserveck'])
    ->name('reserveck');


Route::get('/manage-administrator',[PostController::class, 'manage_administrator'])
    ->name('manage.administrator')->middleware('login');


// サインイン
Route::post('/signin',[PostController::class, 'signin'])
->name('signin');
Route::post('/loginmiss',[PostController::class, 'loginmiss']);

// ユーザーがサイドメニューの予約ボタンを押した時
Route::get('/userview/reserve',[UserController::class, 'userview_reserve'])
->name('/userview/reserve');

// ユーザーが予約情報を入れて予約確認ボタンを押した時
// ユーザーが入力した情報を画面に反映する。
Route::post('/userview/confirm',[UserController::class, 'userview_reserve_confirm'])
->name('reserve.confirm');

Route::post('/userview/store',[UserController::class, 'user_store'])
->name('user.store');

Route::post('/userview/complete',[UserController::class, 'user_complete'])
->name('user.complete');


Route::get('/administratoradd',[AdminController::class, 'administratoradd'])
->name('administrator.add')->middleware('login');

Route::post('/administrators/store',[AdminController::class, 'administratorstore'])
->name('administrator.store')->middleware('login');

Route::get('/administrator/{administrator}', [AdminController::class, 'administrator_show'])
    ->name('administrator.show')->middleware('login');

Route::get('/administrator/{administrator}/edit', [AdminController::class, 'administrator_edit'])
    ->name('administrator.edit')
    ->where('reserve', '[0-9]+')->middleware('login');

Route::patch('/administrator/{administrator}/update', [AdminController::class, 'administrator_update'])
    ->name('administrator.update')
    ->where('administrator', '[0-9]+')->middleware('login');

Route::get('/administrator/{administrator}/destroy', [AdminController::class, 'administrator_destroy'])
    ->name('administrator.destroy')
    ->where('administrator', '[0-9]+')->middleware('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [PostController::class, 'logout'])
	->name('logout');

// Route::get('/upload/image',[ImageController::class, 'input']);

// Route::post('/upload/image/upload',[ImageController::class, 'upload']);

// Route::get('/upload/image/output',[ImageController::class, 'output']);


