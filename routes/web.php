<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect("login");
});
Route::get('login',['as'=>'login', function () {
    if (session()->get('data.role')==1) {
        return redirect()->to("user/dashboard");
    } else {

    return view('auth.login');
    }
}]);
Route::post('login/verification', [AuthController::class,'formLogin']);
// use for new logout
Route::get('session/logout', function () {
    Auth::guard('web')->logout();
    session()->flush();
    return redirect("/");
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::view('user/dashboard', 'user.dashboard');
Route::view('user/contract', 'user.contract');
Route::view('user/contract/create', 'user.createContract');
Route::get('user/contract/store', [ContractController::class,'contractCheck']);
// development
Route::view('dev/map', 'dev.map');
// use for tes
Route::get('session/make', [AuthController::class,'saveSession']);
Route::get('session/show', [AuthController::class,'callSession']);
Route::get('session/clear', [AuthController::class,'clearSession']);
Route::post('login/verification',[AuthController::class,'formLogin']);
