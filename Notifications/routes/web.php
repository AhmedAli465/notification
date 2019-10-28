<?php

use App\Notifications\TaskCompleted;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use App\User; 
// use Notification;

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

Route::get('/', function () {


	// User::find(1)->notify(new TaskCompleted);
	// $users = User::find(1);
	// Notification::send($users, new TaskCompleted());


    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('notify',function(){
	$users= User::all();
	$letter = collect(['title'=>'New Policy','body'=>'We have updated our policy']);
	Notification::send($users, new DatabaseNotification($letter));
	echo 'Notifications Send to all users.';
});

Route::get('markAsRead',function(){
	\Auth::user()->notifications->markAsRead();
	return redirect()->back();
})->name('markAsRead');


















