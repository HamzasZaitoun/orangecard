<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCardController;
use App\Http\Controllers\VCardController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Public Digital Card View - Full Screen with Name in URL
Route::get('/card/{slug}', [PublicCardController::class, 'show'])->name('card.public');

// Download VCard
Route::get('/card/{slug}/vcard', [VCardController::class, 'download'])->name('card.vcard');

// Exchange Contacts (Add to Contact with visitor info)
Route::post('/card/{slug}/add-contact', [PublicCardController::class, 'addContact'])->name('card.add-contact');

// Authentication Routes (Laravel Breeze)
require __DIR__ . '/auth.php';


// Standard User Routes
Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/dashboard/edit', [App\Http\Controllers\CardEditorController::class, 'edit'])->name('dashboard.edit');
    Route::post('/dashboard/update', [App\Http\Controllers\CardEditorController::class, 'update'])->name('dashboard.update');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', \App\Livewire\UserList::class)->name('users');
    Route::get('/users/create', \App\Livewire\CreateUserForm::class)->name('users.create');
});

// Super Admin Routes
Route::middleware(['auth', 'role:super_admin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/admins', \App\Livewire\AdminManager::class)->name('admins');
});

// Redirect after login based on role
Route::middleware('auth')->get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isSuperAdmin()) {
        return redirect()->route('superadmin.admins');
    }

    if ($user->isAdmin()) {
        return redirect()->route('admin.users');
    }

    return redirect()->route('dashboard.edit');
})->name('dashboard');
