<?php

use App\Http\Controllers\Backend\BatchController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Frontend\ReqController;
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


Route::get('/blank', [FpageController::class, 'blank']);
Route::get('/', [FpageController::class, 'fhome'])->name('fHome');
Route::get('/course/details/{slug}', [FpageController::class, 'courseDetails'])->name('course_details');
Route::post('regestration/store', [ReqController::class, 'store'])->name('registration.store');
Route::get('regestration/index', [ReqController::class, 'index'])->name('registration.index');
Route::get('regestration/show/{id}', [ReqController::class, 'show'])->name('registration.show');
Route::get('regestration/pdf/{id}', [ReqController::class, 'pdf'])->name('registration.pdf');
Route::get('regestration/export', [ReqController::class, 'export'])->name('registration.export');
Route::post('regestration/bulk-admission', [ReqController::class, 'bulkAdmission'])->name('registration.bulkAdmission');
Route::get('students/index', [ReqController::class, 'students'])->name('students.index');
Route::get('students/export', [ReqController::class, 'studentsExport'])->name('students.export');

Route::get('/districts/{division}', [LocationController::class, 'districts']);
Route::get('/upazilas/{district}', [LocationController::class, 'upazilas']);
Route::get('/post-offices/{upazila}', [LocationController::class, 'postOffices']);






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
            Route::post('/course/order-update', action: 'orderUpdate')->name('course.order_update');
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

    Route::group(['prefix' => '/hero_slider'], function () {
        Route::controller(\App\Http\Controllers\Backend\ContentController::class)->group(function () {
            Route::get('/', action: 'Slider_index')->name('hero_slider.index');
            Route::get('/create', action: 'Slider_create')->name('hero_slider.create');
            Route::get('/edit/{slider}', action: 'Slider_edit')->name('hero_slider.edit');
            Route::post('/store', action: 'Slider_store')->name('hero_slider.store');
            Route::post('/update/{partner}', action: 'Slider_update')->name('hero_slider.update');
        });
    });
    Route::post('/hero-slider/order-update', [\App\Http\Controllers\Backend\ContentController::class, 'Slider_orderUpdate'])->name('hero_slider.order_update');

    Route::prefix('/partners')->group(function() {
        Route::get('/', [\App\Http\Controllers\Backend\PartnerController::class, 'index'])->name('partner.index');
        Route::post('/store', [\App\Http\Controllers\Backend\PartnerController::class, 'store'])->name('partner.store');
        Route::post('/update/{partner}', [\App\Http\Controllers\Backend\PartnerController::class, 'update'])->name('partner.update');
        Route::delete('/destroy/{partner}', [\App\Http\Controllers\Backend\PartnerController::class, 'destroy'])->name('partner.destroy');
        Route::post('/order-update', [\App\Http\Controllers\Backend\PartnerController::class, 'orderUpdate'])->name('partner.order_update');
    });


    Route::prefix('employees')->group(function () {

        Route::get('/', [App\Http\Controllers\Backend\EmployeeController::class,'index'])
            ->name('employee.index');
        Route::post('/store', [App\Http\Controllers\Backend\EmployeeController::class,'store'])
            ->name('employee.store');
        Route::post('/update/{id}', [App\Http\Controllers\Backend\EmployeeController::class,'update'])
            ->name('employee.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Backend\EmployeeController::class,'destroy'])
            ->name('employee.destroy');
        Route::post('/order-update', [App\Http\Controllers\Backend\EmployeeController::class,'orderUpdate'])
            ->name('employee.order_update');

    });

    Route::resource('batch', BatchController::class);
    Route::post('/batch/change-status', [BatchController::class, 'changeStatus'])->name('batch.changeStatus');







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
