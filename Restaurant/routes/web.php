<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/login',[PostController::class, 'login'])
->name('login');

Route::get('/admin',[PostController::class, 'admin'])
->name('admin');

Route::get('/manage-menu',[PostController::class, 'manage_menu'])
->name('manage.menu');

Route::get('/menuadd',[PostController::class, 'menu_add'])
->name('menus.add');

Route::post('/menus/store',[PostController::class, 'menu_store'])
->name('menus.store');

Route::get('/menus/{menu}', [PostController::class, 'menus_show'])
    ->name('menus.show');

Route::get('/menus/{menu}/edit', [PostController::class, 'menus_edit'])
    ->name('menus.edit')
    ->where('menu', '[0-9]+');

Route::patch('/menus/{menu}/update', [PostController::class, 'update'])
    ->name('menus.update')
    ->where('menu', '[0-9]+');

Route::get('/menus/{menu}/destroy', [PostController::class, 'destroy'])
    ->name('menus.destroy')
    ->where('menu', '[0-9]+');


Route::get('/manage-reserve',[PostController::class, 'manage_reserve'])
    ->name('manage.reserve');

// 予約追加画面
Route::post('/reserve/store',[PostController::class, 'reserve_store'])
    ->name('reserve.store');


Route::get('/reserveadd',[PostController::class, 'reserve_add']);

Route::get('/administratordd',[PostController::class, 'administratordd']);

Route::get('/reserves/{reservation}', [PostController::class, 'reserve_show'])
    ->name('reserve.show');


Route::get('/reserves/{reservation}/edit', [PostController::class, 'reserve_edit'])
    ->name('reserve.edit')
    ->where('reserve', '[0-9]+');


Route::patch('/reserves/{reservation}/update', [PostController::class, 'reserveupdate'])
    ->name('reserve.update')
    ->where('reserve', '[0-9]+');

Route::get('/reserves/{reservation}/destroy', [PostController::class, 'reservedestroy'])
    ->name('reserve.destroy')
    ->where('reserve', '[0-9]+');

Route::get('/reserveck',[PostController::class, 'reserveck'])
    ->name('reserveck');

Route::get('/manage-administrator',[PostController::class, 'manage_administrator'])
    ->name('manage.administrator');


Route::get('/administratoradd',[PostController::class, 'administratoradd'])
->name('administrator.add');

Route::post('/administrators/store',[PostController::class, 'administratorstore'])
->name('administrator.store');

// サインイン
Route::post('/signin',[PostController::class, 'signin'])
->name('signin');

Route::post('/loginmiss',[PostController::class, 'loginmiss']);

// ユーザーがサイドメニューの予約ボタンを押した時
Route::get('/userview/reserve',[PostController::class, 'userview_reserve'])
->name('/userview/reserve');

// ユーザーが予約情報を入れて予約確認ボタンを押した時
// ユーザーが入力した情報を画面に反映する。
Route::post('/userview/confirm',[PostController::class, 'userview_reserve_confirm'])
->name('reserve.confirm');

Route::post('/userview/store',[PostController::class, 'user_store'])
->name('user.store');

Route::post('/userview/complete',[PostController::class, 'user_complete'])
->name('user.complete');

Route::get('/administrator/{administrator}', [PostController::class, 'administrator_show'])
    ->name('administrator.show');

Route::get('/administrator/{administrator}/edit', [PostController::class, 'administrator_edit'])
    ->name('administrator.edit')
    ->where('reserve', '[0-9]+');

Route::patch('/administrator/{administrator}/update', [PostController::class, 'administrator_update'])
    ->name('administrator.update')
    ->where('administrator', '[0-9]+');

Route::get('/administrator/{administrator}/destroy', [PostController::class, 'administrator_destroy'])
    ->name('administrator.destroy')
    ->where('administrator', '[0-9]+');
