<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Users\Users;
use App\Livewire\Users\UsersAdd;
use App\Livewire\Users\UsersEdit;
use App\Livewire\Users\UsersDelete;
use App\Livewire\ReportedMotorcycles\ReportedMotorcycles;
use App\Livewire\ReportedMotorcycles\View\ReportedMotorcycle;
use App\Livewire\ReportedMotorcycles\Add\Page as AddMotorPage;
use App\Livewire\ReportedMotorcycles\Edit\Page as EditMotorPage;


Route::get('/', function () {
    if(Auth::check()){
        return redirect('/welcome');
    }else{
        return redirect('/login');
    }
  
});
Route::get('/practice', function () {
    return view('practice');
});
Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/counter', Counter::class)->name('counter');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    
    Route::get('/users', Users::class)->name('users');
    Route::get('/users/add', UsersAdd::class)->name('users.add');
    Route::get('/users/edit/{id}', UsersEdit::class)->name('users.edit');
    // Route::get('/users/delete/{id}', UsersDelete::class)->name('users.delete');

    Route::get('/reported-motorcycles', ReportedMotorcycles::class)->name('reported-motorcycles');
    Route::get('/reported-motorcycles/add', AddMotorPage::class)->name('reported-motorcycles.add');
    Route::get('/reported-motorcycles/edit/{id}', EditMotorPage::class)->name('reported-motorcycles.edit');
    Route::get('/reported-motorcycles/view/{id}', ReportedMotorcycle::class)->name('reported-motorcycles.view-reported-motorcycle');

}); 