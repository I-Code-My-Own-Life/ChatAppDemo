<?php

use App\Http\Controllers\MessageController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\MessageConverter;
use Symfony\Component\Translation\MessageCatalogue;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [MessageController::class,'index'])->middleware('auth');

Route::get('/chat/{user}', function (User $user){
    return view('chat.user',[
        'user' => $user
    ]);
})->middleware('auth')->name('chat.user');

Route::post('/sendMessage/{receiverId}',[MessageController::class,'sendMessage'])->name('message.send')->middleware('auth');
