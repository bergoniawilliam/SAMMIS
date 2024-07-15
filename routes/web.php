<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Users\Users;
use App\Livewire\Users\UsersAdd;
use App\Livewire\Users\UsersEdit;
use App\Livewire\Users\UsersDelete;

use App\Livewire\Motorcycles\Motorcycles;
use App\Livewire\Motorcycles\MotorcyclesAdd;

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

    Route::get('/motorcycles', Motorcycles::class)->name('motorcycles');
    Route::get('/motorcycles/add', MotorcyclesAdd::class)->name('motorcycles.add');


}); 