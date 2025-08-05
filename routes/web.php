<?php

use App\Http\Controllers\AdminControler;
use App\Http\Controllers\CatagoryControler;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// login/signUP routes
Route::get('/login', [UserControler::class, 'loginLink']);
Route::get('/signUp', [UserControler::class, 'signUpLink']);

Route::post('/login', [UserControler::class, 'login']);
Route::post('/signUp', [UserControler::class, 'signUp']);
Route::get('/logout', [UserControler::class, 'logout']);

// create post routes
Route::get('/createPost', [PostControler::class, 'createLink']);
Route::post('/createPost', [PostControler::class, 'createPost']);

// admin routes
Route::get('/category', [CatagoryControler::class, 'category']);
Route::get('/adminPanel', [AdminControler::class, 'adminPanel']);
