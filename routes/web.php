<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//route pour la page home
Route::get('/', function () {
    return view('home/home');
})->name('app_home');

//route pour la page about
Route::get('/about', function () {
    return view('home/about');
})->name('app_about');

//route pour la page dashbord
Route::match(['get', 'post'], '/dashbord', [HomeController::class,'dashbord'])
->middleware('auth')
->name('app_dashbord');

// Route pour la déconnexion
Route::get('/logout', [HomeController::class, 'logout'])
    ->name('app_logout');

// Route pour vérifier l'existence d'un email
Route::post('/existEmail', [HomeController::class, 'existEmail'])
    ->name('app_existEmail');


//Ces routes sont gerés directement par fortify dans le dossier providers -FortifyProviderServices

/* Route::match(['get', 'post'], '/login', [HomeController::class,'login'])
->name('app_login');

Route::match(['get', 'post'], '/register', [HomeController::class,'register'])
->name('app_register');*/


