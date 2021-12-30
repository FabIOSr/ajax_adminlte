<?php

use App\Http\Controllers\Panel\MainController;
use App\Http\Controllers\Site\MainController as SiteMainController;
use Illuminate\Support\Facades\Route;

// rotas do site
Route::name('site.')->group(function(){
    Route::name('main.')->group(function(){
        Route::get('/', [SiteMainController::class, 'index'])->name('index');
    });
});

// rotas do painel
Route::middleware(['auth'])->name('panel.')->group(function(){
    Route::name('main.')->group(function(){
        Route::get('/painel-de-controle', [MainController::class, 'index'])->name('index');
    });
});

//rotas de sistemas
Route::name('system.')->group(function(){
    Route::name('main.')->group(function(){
        Route::get('/system', '\App\Http\Controllers\Controller\System\MainController@index')->name('index');
    });
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
