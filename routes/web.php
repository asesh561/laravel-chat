<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageHeaderController;
use App\Http\Controllers\ChunkUploadController;


Route::middleware(['auth'])->group(function () {
Route::get('/', [ChatController::class, 'index'])->name('ChatController');
Route::post('/send-message', [ChatController::class, 'store'])->name('ChatController-store');
Route::POST('/send-groupmessage', [ChatController::class, 'gstore'])->name('ChatController-store');
Route::post('/update-user', [ChatController::class, 'ustore'])->name('user.store');
Route::GET('/chat-message', [ChatController::class, 'chatdata'])->name('ChatController-chatdata');
Route::GET('/chat-gmessage', [ChatController::class, 'gchatdata'])->name('ChatController-chatdata');
});




Route::get('/signup', [RegisterController::class, 'index'])->name('Auth.signup');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/newpassword', [RegisterController::class, 'newpassword'])->name('Auth.newpassword');
Route::post('/passstore', [RegisterController::class, 'passstore'])->name('passstore');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logincheck', [LoginController::class, 'logincheck'])->name('logincheck');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// me work

Route::get('/search', [ChatController::class, 'search']);
Route::resource('message-headers', MessageHeaderController::class);
Route::GET('/save-chat', [ChatController::class, 'storeme'])->name('save-chat');

Route::GET('/store-group', [ChatController::class, 'storeGroup']);
Route::GET('/update-group', [ChatController::class, 'updateGroup']);
Route::GET('/delete-user', [ChatController::class, 'delete']);

Route::GET('/store-groupchat', [ChatController::class, 'storeGroupchat']);

Route::post('/upload-chunk', [ChunkUploadController::class, 'uploadChunk']);
Route::get('/get-rest-users', [ChatController::class, 'searchxrest']);
Route::get('/get-all-users', [ChatController::class, 'searchx']);
Route::post('/search-messages', [ChatController::class, 'searchMessages'])->name('search.messages');



Route::get('/chatdata', [ChatController::class, 'chatdata'])->name('chatdata');
