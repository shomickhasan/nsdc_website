<?php

use App\Http\Controllers\Backend\PartnerController;
use App\Models\FieldConfiguration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\TraningController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FielConfigurationController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Response\ResponseController;
use App\Http\Controllers\Backend\DhashboardController;
use App\Http\Controllers\Backend\ActivityLogController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\Uddokta\UddoktaController;
use App\Http\Controllers\Backend\Report\UddoktaReportController;
use App\Http\Controllers\Frontend\FpageController;

/*
|--------------------------------------------------------------------------
| Route For frontend
|--------------------------------------------------------------------------*/



Route::get('/home', [FpageController::class, 'fhome'])->name('fHome');
Route::get('/blank', [FpageController::class, 'blank']);





/*
|--------------------------------------------------------------------------
| Route For Admin Dashboard
|--------------------------------------------------------------------------*/

Route::get('change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change.language');


Route::get('/admin', [DhashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('administration')->group(function () {
        //user
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}/view', [UserController::class, 'view'])->name('users.view');
        Route::get('/user-activity', [ActivityLogController::class, 'index'])->name('activityLog.index');
    });

     Route::group(['prefix' => '/course'], function () {
        Route::controller(CourseController::class)->group(function () {
            Route::get('/index', action: 'index')->name('course.index');
            Route::get('/create', action: 'create')->name('course.create');
            Route::get('/edit/{course}', action: 'edit')->name('course.edit');
            Route::post('/store', action: 'store')->name('course.store');
            Route::post('/update/{course}', action: 'update')->name('course.update');
        });
    });

    Route::group(['prefix' => '/our_partner'], function () {
        Route::controller(PartnerController::class)->group(function () {
            Route::get('/index', action: 'index')->name('our_partner.index');
            Route::get('/create', action: 'create')->name('our_partner.create');
            Route::get('/edit/{partner}', action: 'edit')->name('our_partner.edit');
            Route::post('/store', action: 'store')->name('our_partner.store');
            Route::post('/update/{partner}', action: 'update')->name('our_partner.update');
        });
    });






    Route::group(['prefix' => '/field/confiquration'], function () {
        Route::controller(FielConfigurationController::class)->group(function () {
            Route::get('/index', 'index')->name('fields.index');
            Route::post('/store', 'store')->name('fields.store');
        });
    });
});



    // Response Controller
    Route::controller(ResponseController::class)
        ->prefix('/response')->group(function () {
        Route::get('/districts','district')->name('district.response');
    });




/*
|--------------------------------------------------------------------------
| End Demo Template
|--------------------------------------------------------------------------*/


require __DIR__ . '/auth.php';
