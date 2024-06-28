<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\NewsletterController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('newsletters', [AdminNewsletterController::class, 'index'])->name('newsletters.index');
    Route::get('newsletters/create', [AdminNewsletterController::class, 'create'])->name('newsletters.create');
    Route::post('newsletters', [AdminNewsletterController::class, 'store'])->name('newsletters.store');
    Route::get('newsletters/{newsletter}', [AdminNewsletterController::class, 'show'])->name('newsletters.show');
    Route::get('newsletters/{newsletter}/edit', [AdminNewsletterController::class, 'edit'])->name('newsletters.edit');
    Route::put('newsletters/{newsletter}', [AdminNewsletterController::class, 'update'])->name('newsletters.update');
    Route::delete('newsletters/{newsletter}', [AdminNewsletterController::class, 'destroy'])->name('newsletters.destroy');
    Route::patch('newsletters/{id}/restore', [AdminNewsletterController::class, 'restore'])->name('newsletters.restore');
});

Route::get('newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');

