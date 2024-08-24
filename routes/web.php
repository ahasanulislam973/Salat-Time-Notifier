<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    Notification::route('slack', config('salatnotifier.slack_webhook_url'))
        ->notify(new \LaravelSalatNotifier\Notifications\SalatNotification('Test Salat'));

    return 'Notification sent!';
});