<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Laravel\Jetstream\Rules\Role;


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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [@App\Http\Controllers\DashboardController::class, 'dataResult'])->name('dashboard');

//send email (not working)
Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from AnimalFarmManagement.com',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('zahidrasmi@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});

// Animal controller route
// Display animal list page
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList', [@App\Http\Controllers\AnimalController::class, 'animalList'])->name('manager.animal.animalList');

//Link to register animal
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList/register', [@App\Http\Controllers\AnimalController::class, 'createAnimal'])->name('manager.animal.insertAnimal');

//Save animal to database route
Route::middleware(['auth:sanctum', 'verified'])->post('/animalList', [@App\Http\Controllers\AnimalController::class, 'saveAnimal'])->name('manager.animal.save');

//Link to animal edit page
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList/edit/{id}', [@App\Http\Controllers\AnimalController::class, 'editAnimal'])->name('manager.animal.editAnimal');

//Link to animal history page
Route::middleware(['auth:sanctum', 'verified'])->get('animalList/history/{id}', [@App\Http\Controllers\AnimalController::class, 'animalHistoryList'])->name('manager.animal.historyAnimal');

//Save edit animal data
Route::middleware(['auth:sanctum', 'verified'])->put('animalList/{id}', [@App\Http\Controllers\AnimalController::class, 'saveEditAnimal'])->name('manager.animal.saveEditAnimal');

//Link to update animal page
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList/update/{id}', [@App\Http\Controllers\AnimalController::class, 'updateAnimal'])->name('manager.animal.updateAnimal');

// Link to delete animal
Route::middleware(['auth:sanctum', 'verified'])->delete('/animalList/{id}', [@App\Http\Controllers\AnimalController::class, 'deleteAnimal'])->name('manager.animal.deleteAnimal');

//Save animal update to database
Route::middleware(['auth:sanctum', 'verified'])->put('animalList/saveUpdate/{id}', [@App\Http\Controllers\AnimalController::class, 'saveUpdateAnimal'])->name('manager.animal.saveUpdateAnimal');

// Download animal excel
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList/excel/download', [@App\Http\Controllers\AnimalController::class, 'downloadExcel'])->name('manager.animal.downloadExcel');

// Search animal list
Route::middleware(['auth:sanctum', 'verified'])->get('/animalList/search', [@App\Http\Controllers\AnimalController::class, 'searchAnimal'])->name('manager.animal.searchAnimal');


// Staff controller route
Route::middleware(['auth:sanctum', 'verified'])->get('/staffList', [@App\Http\Controllers\StaffController::class, 'staffList'])->name('manager.staff.staffList');

//QR Code Route
Route::get('qr-code-g', function () {

    SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)
        ->format('png')
        ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

    return view('qrCode');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/qrCode', function () {
    return view('manager.animal.qrCode');
})->name('manager.animal.qrCode');

//Worktable
Route::middleware(['auth:sanctum', 'verified'])->get('/tableList', [@App\Http\Controllers\WorktableController::class, 'workTable'])->name('manager.worktable.tableList');

// Link to Create Worktable
Route::middleware(['auth:sanctum', 'verified'])->get('/tableList/createWork', [@App\Http\Controllers\WorktableController::class, 'viewWorktable'])->name('manager.worktable.createWork');

// Save worktable data
Route::middleware(['auth:sanctum', 'verified'])->post('/tableList', [@App\Http\Controllers\WorktableController::class, 'saveWorktable'])->name('manager.worktable.save');

// Delete worktable
Route::middleware(['auth:sanctum', 'verified'])->delete('/worktable/{id}', [@App\Http\Controllers\WorktableController::class, 'deleteTable'])->name('manager.worktable.deleteTable');

// Download worktable excel
Route::middleware(['auth:sanctum', 'verified'])->get('/tableList/excel/download', [@App\Http\Controllers\WorktableController::class, 'downloadWorktableExcel'])->name('manager.worktable.downloadExcel');

// Filter search animal List
Route::middleware(['auth:sanctum', 'verified'])->get('/tableList/search', [@App\Http\Controllers\WorktableController::class, 'searchWorktable'])->name('manager.worktable.searchWorktable');

// Animal activity
Route::middleware(['auth:sanctum', 'verified'])->get('/animalActivity', [@App\Http\Controllers\ActivityController::class, 'activityList'])->name('manager.animal.activityList');

// Download animal activity
Route::middleware(['auth:sanctum', 'verified'])->get('/animalActivity/excel/download', [@App\Http\Controllers\ActivityController::class, 'activityDownload'])->name('manager.animal.activityDownload');

// Filter search activity
Route::middleware(['auth:sanctum', 'verified'])->get('/animalActivity/search', [@App\Http\Controllers\ActivityController::class, 'searchActivity'])->name('manager.animal.searchActivity');

//Notification List
Route::middleware(['auth:sanctum', 'verified'])->get('/notifications', function () {
    return view('manager.notificiation.notiList');
})->name('manager.notificiation.notiList');
