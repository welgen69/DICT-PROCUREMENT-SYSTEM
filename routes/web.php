<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;


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

/** set active side bar */
function set_active($route) {
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('/');

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('dashboard/page', 'index')->name('dashboard/page');
    Route::get('form/input', 'index')->name('form/input');
});
// -------------------------------- form ------------------------------------//
Route::controller(FormController::class)->group(function () {
    Route::get('form/input/page', 'formIndex')->name('form/input/page');
    Route::post('form/input/save', 'formSaveRecord')->name('form/input/save');
    Route::get('form/page/view', 'formView')->name('form/page/view');
    Route::get('form/input/edit/{id}', 'formInputEdit');
    Route::post('form/input/update', 'formUpdateRecord')->name('form/input/update');
    Route::post('form/input/delete', 'formDelete')->name('form/input/delete');
    Route::get('form/update/page', 'formUpdateIndex')->name('form/update/page');

    Route::post('form/upload/file', 'formFileUpdate')->name('form/upload/file'); // file upload
    Route::get('view/upload/file', 'formFileView')->name('view/upload/file'); // file view
    Route::get('download/file/{file_name}', 'fileDownload'); // file download
    Route::post('download/file/delete', 'fileDelete')->name('download/file/delete'); // file delete

    Route::get('form/radio/index', 'radioIndex')->name('form/radio/index'); // radio index
    Route::post('form/radio/save', 'radioSave')->name('form/radio/save'); // radio save

    Route::get('form/checkbox/index', 'checkboxIndex')->name('form/checkbox/index'); // checkbox index
    Route::post('form/checkbox/save', 'saveRecordCheckbox')->name('form/checkbox/save'); // checkbox save

});
