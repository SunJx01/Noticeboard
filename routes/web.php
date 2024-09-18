<?php

use App\Http\Controllers\navbar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usermanagement;
use App\Http\Controllers\session_controller;
use App\Http\Controllers\systemview;

 //-----------------------------------------------------------------------------------------------------------------------------------------------------

//Routes for Login/Signup:
Route::get('/', [usermanagement:: class, 'login_form'])->name('login_form');
Route::post('/login', [usermanagement:: class, 'login_verification'])->name('login');
Route::get('/admin-signup', [usermanagement:: class, 'admin_signup'])->name('admin_signup');
Route::post('/verify_admin', [usermanagement:: class, 'verify_admin'])->name('verify_admin');
Route::get('verify_newuser/{name}', [usermanagement:: class, 'verify_newuser'])->name('verify_newuser');
Route::post('verify_newuser_form', [usermanagement:: class, 'verify_newuser_form'])->name('verify_newuser_form');

 //-----------------------------------------------------------------------------------------------------------------------------------------------------

//Routes for dashboard:
Route::get('/dashboard', [systemview:: class, 'dashboardAdmin'])->name('dashboardAdmin');

//-----------------------------------------------------------------------------------------------------------------------------------------------------

//Routes for components:
    Route::get('/logout',[navbar::class, 'logout'])->name('logout');
    Route::post('/new-group',[navbar::class, 'addnewgroup'])->name('addnewgroup');
    Route::get('/noticepages/{group_name}',[navbar::class, 'noticepages'])->name('noticepages');
    Route::post('/adduser',[usermanagement::class, 'create_user'])->name('adduser');
    Route::post('/addmember',[navbar::class, 'addmember'])->name('addmember');
    Route::post('/make-mod',[usermanagement::class,'make_mod'])->name('make_mod');
    Route::post('/make-user',[usermanagement::class,'make_user'])->name('make_user');
    Route::post('/posts',[systemview::class,'posts'])->name('posts');

 //-----------------------------------------------------------------------------------------------------------------------------------------------------


 //-----------------------------------------------------------------------------------------------------------------------------------------------------



 //-----------------------------------------------------------------------------------------------------------------------------------------------------
?>