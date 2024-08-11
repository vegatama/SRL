<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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


Route::get('/sign_up', [MainController::class, 'sign_up'])->name('sign_up');
Route::post('/sign_up_action', [MainController::class, 'sign_up_action'])->name('sign_up.action');

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login', [MainController::class, 'login_action'])->name('login.action');

Route::get('/logout_action', [MainController::class, 'logout_action'])->name('logout_action');

Route::get('/leaderboard', [MainController::class, 'leaderboard']);


Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/account_admin', function () {
        return view('admin/account-admin');
    })->name('account_admin');

    Route::get('/home-admin', [MainController::class, 'home_admin'])->name('home_admin');

    Route::get('/add_course', [MainController::class, 'add_course']);

    Route::post('/add_course', [MainController::class, 'store_course'])->name('store_course');

    Route::get('/edit_course/{id_course}', [MainController::class, 'edit_courses']);

    Route::post('/edit_course', [MainController::class, 'update_course'])->name('update_course');

    Route::get('/delete_course/{id_course}', [MainController::class, 'delete_course']);

    Route::put('\account_admin', [MainController::class, 'update_account'])->name('update_account_admin');

    Route::get('/coursedetail-admin/{id_course}', [MainController::class, 'courses_detail_admin']);
    Route::post('/coursedetail-admin', [MainController::class, 'update_summary'])->name('update_summary');

    Route::get('/edit_video/{id_course}', [MainController::class, 'edit_video']);
    Route::post('/edit_video', [MainController::class, 'update_video'])->name('update_video');

    Route::get('/edit_audio/{id_course}', [MainController::class, 'edit_audio']);
    Route::post('/edit_audio', [MainController::class, 'update_audio'])->name('update_audio');

    Route::get('/edit_text/{id_course}', [MainController::class, 'edit_text']);
    Route::post('/edit_text', [MainController::class, 'store_file'])->name('store_file');

    Route::get('/test_admin/{id_course}', [MainController::class, 'test_admin']);
    Route::post('/test_admin', [MainController::class, 'store_test'])->name('store_test');

    Route::get('/results_admin/{id_course}', [MainController::class, 'result_admin']);
});


Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::get('/account', function () {
        return view('user/account');
    })->name('account');

    Route::get('/home', function () {
        return view('user/home');
    })->name('home');

    Route::get('/course', [MainController::class, 'course']);

    Route::put('/account', [MainController::class, 'update_account'])->name('update_account');

    Route::get('/coursedetail/{id_course}', [MainController::class, 'courses_detail']);

    Route::get('/coursecontent/{id_course}', [MainController::class, 'courses_content']);

    Route::get('/coursetest/{id_course}', [MainController::class, 'courses_test']);

    Route::get('/test/{id_course}', [MainController::class, 'test']);
    Route::post('/test', [MainController::class, 'store_test_result'])->name('store_test_result');

    Route::get('/results/{id_course}', [MainController::class, 'result']);
});
