<?php

use App\HTTP\Controllers\PostController;
use App\HTTP\Controllers\RegisterController;
use App\HTTP\Controllers\SessionsController;
use App\HTTP\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('ping', function(){
    $mailchimp = new MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us17',
    ]);

$response = $mailchimp->lists->addListMember('1291175f17',[
    'email_address'=>'rando@gmail.com',
    'status'=>'subscribed'
]);
ddd($response);
});

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments',[PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('admin');