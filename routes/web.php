<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCategoryController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('layouts.admin', [
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name"  => "Akatara",
        "email" => "Akatara@gmail.com",
        "nomor" => "01787183513",
        "image" => "akatara.jpg",
        'active' => 'about'
    ]);
});


Route::get('/', [BerandaController::class, 'index'] );
Route::get('beranda/{home:slug}', [BerandaController::class, 'show']);


Route::get('/categories', [CategoryController::class, 'index'] );

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);




//admin
Route::group(['middleware'=> ['checkAuth']], function() {
    Route::get('/admin', [DashboardAdminController::class, 'admin']);
    Route::get('/admin/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/admin/posts', DashboardPostController::class);
    Route::resource('/admin/users', DashboardUserController::class);
    Route::resource('/admin/categories', DashboardCategoryController::class)->except('show');
});





