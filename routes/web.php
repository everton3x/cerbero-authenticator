<?php

use Router\Route;
use Cerbero\Authenticator\Controller\RootController;
use Cerbero\Authenticator\Controller\LoginController;
use Cerbero\Authenticator\Controller\LogonController;
use Cerbero\Authenticator\Controller\LogoutController;

Route::get('/', RootController::class)->name('root');
Route::get('/login', LoginController::class)->name('login');
Route::post('/logon', LogonController::class)->name('logon');
Route::get('/logout', LogoutController::class)->name('logout');
