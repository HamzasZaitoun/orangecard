<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCardController;
use App\Http\Controllers\VCardController;
use App\Http\Controllers\CardEditLoginController;
use App\Http\Controllers\TemplateCardController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Public Digital Card View - Full Screen with Name in URL
Route::get('/card/{slug}', [PublicCardController::class, 'show'])->name('card.public');
// Template Card Routes (for users without digital cards)
Route::get('/template/{userId}', [TemplateCardController::class, 'show'])->name('card.template');
Route::get('/template/{userId}/login', [TemplateCardController::class, 'showLoginForm'])->name('card.template.login');
Route::post('/template/{userId}/login', [TemplateCardController::class, 'login'])->name('card.template.login.post');
// Card Edit Login Routes
Route::get('/card/{slug}/edit-login', [CardEditLoginController::class, 'showLoginForm'])->name('card.edit.login.form');
Route::post('/card/{slug}/edit-login', [CardEditLoginController::class, 'login'])->name('card.edit.login');

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
