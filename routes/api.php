<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BrickController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TargetController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login'   , [AuthController::class, 'login'])->name('promed.login');
    Route::post('register', [AuthController::class, 'register'])->name('promed.register');
    Route::get('user'     , [AuthController::class, 'user'])->middleware('auth:sanctum')->name('promed.user');
    Route::get('logout'   , [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('promed.logout');
    Route::get('valid', function () {
        return response()->json([ 'valid' => Auth::check() ]);
    })->middleware('auth:sanctum')->name('promed.valid');
});

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'v1.0'
  ], function() {         
        Route::resources([
            'schedules' => ScheduleController::class,
            'clients' => ClientController::class,
            'assignments' => AssignmentController::class,
            'institutions' => InstitutionController::class,
            'organizations' => OrganizationController::class,
            'regions' => RegionController::class,
            'bricks' => BrickController::class,
            'companies' => CompanyController::class,
            'geos' => GeoController::class,
            'targets' => TargetController::class,
        ]);

  });