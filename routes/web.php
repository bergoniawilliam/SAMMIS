<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\User\Users;

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

});