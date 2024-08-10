<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});
// Route::get('/about', function () {
//     return view('about');
// });

Route::resource('posts', App\Http\Controllers\PostController::class);
// Route::get('jobs', [PostController::class, 'joblist']);
// Route::get('/jobs', [PostController::class, 'index']);
// Route::get('jobs', [App\Http\Controllers\ListController::class, 'show']);
// Route::get('posts', [App\Http\Controllers\PageController::class, 'show'])->name('posts');
// Route::resource('posts', App\Http\Controllers\PostController::class);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [PageController::class, 'index'])->name('home');
Route::get('/aboutus', [App\Http\Controllers\PageController::class, 'index'])->name('aboutus');
// Route::get('/jobs', [App\Http\Controllers\PageController::class, 'jobs'])->name('jobs');
// Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

// Route::get('about', [App\Http\Controllers\PageController::class,'about']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    // Route::resource('posts', PostController::class);
    // Route::resource('aboutus', App\Http\Controllers\PageController::class);


    //video chat
    Route::get('video_chat', [App\Http\Controllers\VideoChatController::class, 'index']);
    Route::post('auth/video_chat', [App\Http\Controllers\VideoChatController::class, 'auth']);

});


// Route::group(['middleware' => ['gust']], function() {
//     Route::resource('aboutus', App\Http\Controllers\PageController::class);
//     // Route::resource('users', UserController::class);
//     // Route::resource('products', ProductController::class);
// });

// Route::get('/documents', 'DocumentController@create');
Route::get('/files/create', [App\Http\Controllers\DocumentController::class, 'create']);
Route::post('/files', [App\Http\Controllers\DocumentController::class, 'store']);
Route::get('/files', [App\Http\Controllers\DocumentController::class, 'index']);


Route::get('/files/{id}', [App\Http\Controllers\DocumentController::class, 'show']);

Route::get('/file/download/{file}', [App\Http\Controllers\DocumentController::class, 'download']);


// Route::post('/files/{id}', ['as' => 'documents.approve', 'uses' => 'DocumentController@approve']); 

//application accept route
// Route::get('/selected/{id}', [App\Http\Controllers\DocumentController::class, 'Updatestatus']); //without uid
Route::get('/selected/{id}/{uid}', [App\Http\Controllers\DocumentController::class, 'Updatestatus']);
Route::get('/rejected/{id}/{uid}', [App\Http\Controllers\DocumentController::class, 'Updatestatusrejected']);  //todo tharaka need to pass 2 arguments here
// Route::get('/rejected/{id}/{uid}', [App\Http\Controllers\DocumentController::class, 'Updatestatusrejected2']);
// 

//interview selct/reject
Route::get('/selectedint/{id}/{uid}', [App\Http\Controllers\DocumentController::class, 'UpdatestatusInt']);
Route::get('/rejectedint/{id}/{uid}', [App\Http\Controllers\DocumentController::class, 'UpdatestatusrejectedInt']);  //todo tharaka need to pass 2 arguments here


//send email

Route::get('/sendemail', [App\Http\Controllers\SendEmailController::class, 'index']);
Route::post('/sendemail/send', [App\Http\Controllers\SendEmailController::class, 'send']);
Route::post('/sendemail/send2/{id}', [App\Http\Controllers\SendEmailController::class, 'send2']);

