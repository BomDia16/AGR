<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//admin
Route::get('/', [AdminsController::class, 'welcome'])->name('welcome');

Route::resources(['/admin' => AdminsController::class]);
Route::group(['prefix' => 'admin'], function(){
    //autenticação
    //Route::get('/login', [AdminsController::class, 'index_login'])->name('admin.view');
    Route::post('/login', [AdminsController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminsController::class, 'logout'])->name('admin.logout');
});

Route::get('/login', [AdminsController::class, 'index_login'])->name('admin.view');
Route::post('/login', [AdminsController::class, 'login'])->name('admin.login');

// documents
Route::get('/documentos', [DocumentsController::class, 'index'])->name('document.index');
Route::get('/documentos/create', [DocumentsController::class, 'create'])->name('document.create');
Route::post('/documentos/store', [DocumentsController::class, 'store'])->name('document.store');
Route::get('/documentos/edit/{id}', [DocumentsController::class, 'edit'])->name('document.edit');
Route::put('/documentos/update/{id}', [DocumentsController::class, 'update'])->name('document.update');
Route::delete('/documentos/destroy{id}', [DocumentsController::class, 'destroy'])->name('document.destroy');

// requirements
Route::post('/requisitos/store', [RequirementsController::class, 'store'])->name('requirement.store');
Route::delete('/requisitos/destroy{id}', [RequirementsController::class, 'destroy'])->name('requirement.destroy');

// users
Route::resources(['/user' => UserController::class]);

// Route::get('/login', function () {
//     return view('admins.login');
// })->name('admin.view');


// Route::get('/', function () {
//     return view('admins.home');
// });