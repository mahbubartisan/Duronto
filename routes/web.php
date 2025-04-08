<?php


use App\Livewire\User;
use App\Livewire\Package;
use App\Livewire\Settings;
use App\Livewire\Dashboard;
use App\Livewire\Package\DurontoPackage;
use App\Livewire\Package\RiserPackage;
use App\Livewire\Subcritption\DurontoSubscriber;
use App\Livewire\Subcritption\RiserSubscriber;
use App\Livewire\User\Duronto\CreateDurontoUser;
use App\Livewire\User\Duronto\DurontoUser;
use App\Livewire\User\Duronto\EditDurontoUser;
use App\Livewire\User\Riser\CreateRiserUser;
use App\Livewire\User\Riser\EditRiserUser;
use App\Livewire\User\Riser\RiserUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('dashboard', Dashboard::class)
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('/duronto/users', DurontoUser::class)->name('duronto.user');
    Route::get('/create/duronto/user', CreateDurontoUser::class)->name('duronto.user.create');
    Route::get('/duronto/user/{id}', EditDurontoUser::class)->name('duronto.user.edit');
    Route::get('/riser/users', RiserUser::class)->name('riser.user');
    Route::get('/create/riser/user', CreateRiserUser::class)->name('riser.user.create');
    Route::get('/riser/user/{id}', EditRiserUser::class)->name('riser.user.edit');

    Route::get('/duronto/packages', DurontoPackage::class)->name('duronto.package');
    Route::get('/riser/packages', RiserPackage::class)->name('riser.package');

    Route::get('/duronto/subscriptions', DurontoSubscriber::class)->name('duronto.subscription');
    Route::get('/riser/subscriptions', RiserSubscriber::class)->name('riser.subscription');
    

    Route::get('settings', Settings::class)->name('settings');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
