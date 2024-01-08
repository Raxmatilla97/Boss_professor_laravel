<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\TemporaryFileController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/show/{slug_number?}', [IndexController::class, 'show'])->name('show.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/malumot-joylash', function () {
    return view('reyting.frontend.malumot_joylash_uchun_kirish');
})->name('malumotJoylash');

Route::get('/biz-bilan-boglanish', function () {
    return view('reyting.frontend.contact_us');
})->name('bizBilanBoglanish');

Route::post('/malumot-joylash-sahifasi', [IndexController::class, 'kirishUchunSlugQidirish'])->name('site.kirishUchunSlugQidirish');

Route::post('/murojatni-yuborish', [IndexController::class, 'store'])->name('site.sendRequest');

// Route::resource('files', FilesController::class);


Route::controller(TemporaryFileController::class)->group(function(){
    Route::match(['post','delete'],'temp/upload','index')->name('temporary.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('professors', ProfessorController::class);

    Route::resource('moderator', ModeratorController::class);    
    Route::resource('moderator', ModeratorController::class)
    ->except(['create', 'edit']); // Resourceda 'create' va 'edit' methodlarini istisno qilish
    Route::get('/moderator/{professor_id}/create', [ModeratorController::class, 'create'])->name('moderator.create');
    Route::get('/moderator/{moderator_id}/edit', [ModeratorController::class, 'edit'])->name('moderator.edit');


    Route::resource('operator', OperatorController::class);
    Route::resource('operator', OperatorController::class)
    ->except(['create', 'edit']); // Resourceda 'create' va 'edit' methodlarini istisno qilish
    Route::get('/operator/{id}/create', [OperatorController::class, 'create'])->name('operator.create');
    Route::get('/operator/{operator_id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');

    Route::get('/moderatorlar-list/{name?}', [ModeratorController::class, 'list'])->name('moderator.list');
    Route::get('/operatorlar-list/{name?}', [OperatorController::class, 'list'])->name('operator.list');



});

require __DIR__.'/auth.php';
