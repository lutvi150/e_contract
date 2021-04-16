<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FileAttachmentController;
use App\Http\Controllers\PrintContract;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Verificator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    // echo csrf_token();
    return redirect()->to("login");
});
Route::get('login', ['as' => 'login', function () {
    if (session()->get('data.role') == 1) {
        return redirect()->to("user/dashboard");
    } elseif (session()->get('data.role') == 3) {
        return redirect()->to('admin/dashboard');
    } elseif (session()->get('data.role') == 2) {
        return redirect()->to('verificator/dashboard');
    } else {
        // session()->flush();
        return view('auth.login');
    }
}]);

Route::post('login/verification', [AuthController::class, 'formLogin']);
// use for new logout
Route::get('session/logout', function () {
    Auth::guard('web')->logout();
    session()->flush();
    return redirect("/");
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');
Route::middleware(['userCheck:1'])->group(function () {
    Route::view('user/dashboard', 'user.dashboard');
    Route::view('user/contract', 'user.contract');
    Route::view('user/contract/create', 'user.createContract');
    Route::post('user/contract/store', [ContractController::class, 'contractCheck']);
    Route::get('user/contract/get', [ContractController::class, 'getContract']);
    Route::post('user/contract/delete', [ContractController::class, 'shoftDelete']);
    // Route::get('user/contract/edit/{id}',[ContractController::class,'editContract']);
    Route::post('user/contract/find', [ContractController::class, 'findContract']);
    Route::post('user/contract/update', [ContractController::class, 'updateContract']);
    Route::post('user/contract/sendContract', [ContractController::class, 'sendContract']);
    Route::post('user/contract/count', [ContractController::class, 'countContractUser']);
    Route::post('user/contract/upload/attachment', [FileAttachmentController::class, 'store']);
    Route::post('user/attachment/priview',[AttachmentController::class,'attachmentPriview']);
    Route::post('user/map/save',);
});
// use for admin
Route::middleware(['userCheck:3'])->group(function () {
    Route::view('admin/dashboard', 'admin.dashboard');
});
// verifikatator
Route::middleware(['userCheck:2'])->group(function () {
    Route::view('verificator/dashboard', 'verificator.dashboard');
    Route::get('verificator/contract/count',[Verificator::class,'countContract']);
    Route::view('verificator/contract', 'verificator.contract');
    Route::get('verificator/contract/get', [ContractController::class, 'getContract']);
    Route::view('verificator/contract/review', 'verificator.createContract');
    Route::post('verificator/contract/find', [ContractController::class, 'findContract']);
    Route::post('verificator/attachment/priview',[AttachmentController::class,'attachmentPriview']);
    Route::post('verificator/sendtoserver', [Verificator::class,'sendVerificator']);
});
// print
Route::get('contract/{id}', [PrintContract::class, 'PrintContract']);
// development
Route::view('dev/map', 'dev.map');
Route::view('dev/courency', 'dev.courency');
Route::get('uuid/tes',[ContractController::class,'getUiid']);
Route::get('upload', [UploadController::class, 'index']);
Route::post('upload/store', [UploadController::class, 'store']);
Route::get('district',[ContractController::class,'getDistrict']);
Route::post('villages',[ContractController::class,'getVillages']);
// use for tes
Route::get('session/make', [AuthController::class, 'saveSession']);
Route::get('session/show', [AuthController::class, 'callSphpession']);
Route::get('session/clear', [AuthController::class, 'clearSession']);
Route::post('login/verification', [AuthController::class, 'formLogin']);

// make table
Route::view('chart', 'chart');
Route::get('barcode', [PrintContract::class, 'barcodeTes']);
// tes function
Route::get('tes', function () {
    return response()->json(session()->all());
});
