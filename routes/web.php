<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/home',[
    'uses' => 'HomeController@home',
    'as' => 'page.home'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile',[
    'uses' => 'ProfileController@profile',
    'as' => 'page.profile'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile-post',[
    'uses' => 'ProfileController@profile_post',
    'as' => 'page.profile-post'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile-igtv',[
    'uses' => 'ProfileController@profile_igtv',
    'as' => 'page.profile-igtv'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile-saved',[
    'uses' => 'ProfileController@profile_saved',
    'as' => 'page.profile-saved'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile-tagged',[
    'uses' => 'ProfileController@profile_tagged',
    'as' => 'page.profile-tagged'
]);


Route::middleware(['auth:sanctum', 'verified'])->get('/profile-add-post',[
    'uses' => 'ProfileController@profile_addpost',
    'as' => 'page.profile-addpost'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile-publish-post',[
    'uses' => 'PostController@profile_addpostpage',
    'as' => 'page.profile-addpost2'
]);


Route::post('/profile-publish-post2',[
    'uses' => 'PostController@profile_savepost',
    'as' => 'page.postimage'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/homecomment/{id}',[
    'uses' => 'CommentController@addcomment',
    'as' => 'page.profile-addcomment'
]);

Route::post('/homecomment/{id}',[
    'uses' => 'CommentController@home_savecomment',
    'as' => 'page.addcomment2'
]);



Route::middleware(['auth:sanctum', 'verified'])->get('/edit-data',[
    'uses' => 'ProfileController@profile_edit',
    'as' => 'page.profile-edit'
]);

Route::post('/edit-data',[
    'uses' => 'ProfileController@profile_editdata',
    'as' => 'page.profile-editdata'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/home-like/{id}',[
    'uses' => 'LikeController@Like_page',
    'as' => 'page.profile-like'
]);




Route::post('/home-like',[
    'uses' => 'LikeController@like',
    'as' => 'page.post-like'
]);


//This route is created to save posts

// Route::middleware(['auth:sanctum', 'verified'])->get('/profile-save/{id}',[
//     'uses' => 'SaveController@Save_page',
//     'as' => 'page.profile-save'
// ]);

Route::post('/profile-save2/{id}',[
    'uses' => 'SaveController@save_page_post',
    'as' => 'page.post-save'
]);


// FOLLOW ROUTE

Route::get('/follow/{id}',[
    'uses' => 'HomeController@following',
    'as' => 'page.follow-users'
]);






Route::get('/log',[
    'uses' => 'HomeController@logout',
    'as' => 'page.logout'
]);


// Route::get('/inscription', function () {
//     return view('inscription');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
