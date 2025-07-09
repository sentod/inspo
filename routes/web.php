<?php

use App\Models\Influencer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\RecommendationsController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function ()  {

    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('/messages', [ContactController::class, 'contact'])->name('account.contact'); 
        Route::match(['get', 'post'], 'authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('home', [HomeController::class,'index'])->name('account.home');
        Route::get('recommendations', [RecommendationsController::class, 'showForm'])->name('account.recommendations');
        Route::get('influencers', [InfluencerController::class, 'influencers'])->name('account.influencers');
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::post('result', [RecommendationsController::class, 'getRecommendations'])->name('account.result');
        Route::get('contact', [ContactController::class, 'showContact'])->name('account.contact');

    });

});
