<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'UsersController@search');

Auth::routes();
Route::patch('users/{user}/photo-upload', 'UsersController@photoUpload')->name('users.photo-upload');

Route::group(['middleware' => 'auth'], function () {
    Route::get('password/change', 'Auth\ChangePasswordController@show')->name('password.change');
    Route::post('password/change', 'Auth\ChangePasswordController@update')->name('password.change');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'HomeController@index')->name('profile');
Route::post('family-actions/{user}/set-father', 'FamilyActionsController@setFather')->name('family-actions.set-father');
Route::post('family-actions/{user}/set-mother', 'FamilyActionsController@setMother')->name('family-actions.set-mother');
Route::post('family-actions/{user}/add-child', 'FamilyActionsController@addChild')->name('family-actions.add-child');
Route::post('family-actions/{user}/add-wife', 'FamilyActionsController@addWife')->name('family-actions.add-wife');
Route::post('family-actions/{user}/add-husband', 'FamilyActionsController@addHusband')->name('family-actions.add-husband');
Route::post('family-actions/{user}/set-parent', 'FamilyActionsController@setParent')->name('family-actions.set-parent');
Route::get('disqus', 'DisqusController@index')->name('disqus');

/**
 * facebook login routes
 */
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', 'FaceBookController@login')->name('facebook_login');
    Route::get('callback', 'FaceBookController@callback')->name('callback');
});


/**
 * google login routes
 */
Route::prefix('google')->name('google.')->group( function(){
    Route::get('auth', 'GoogleAuthController@redirect')->name('google_login');
    Route::get('callback', 'GoogleAuthController@callback')->name('callback');
});

/**
 * twitter login routes
 * 
 */
Route::prefix('twitter')->name('twitter.')->group( function(){
    Route::get('auth', 'TwitterAuthController@redirect')->name('twitter_login');
    Route::get('callback', 'TwitterAuthController@callback')->name('callback');
});



Route::get('profile-search', 'UsersController@search')->name('users.search');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('users/{user}', 'UsersController@update')->name('users.update');
Route::get('users/{user}/chart', 'UsersController@chart')->name('users.chart');
Route::get('users/{user}/tree', 'UsersController@tree')->name('users.tree');
Route::get('users/{user}/death', 'UsersController@death')->name('users.death');
Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');


Route::get('users/{user}/marriages', 'UserMarriagesController@index')->name('users.marriages');
Route::get('users/{user}/whatsapp', 'UsersController@whatsapp')->name('users.whatsapp');


// Widget Embed Video Youtube
Route::get('users/{user}/widget_youtube', 'UsersController@widget_youtube')->name('users.widget_youtube');
Route::post('users/{user}/embedpost', 'UsersController@embedpost')->name('users.embedpost');


Route::get('birthdays', 'BirthdayController@index')->name('birthdays.index');

/**
 * Couple/Marriages Routes
 */
Route::get('couples/{couple}', ['as' => 'couples.show', 'uses' => 'CouplesController@show']);
Route::get('couples/{couple}/edit', ['as' => 'couples.edit', 'uses' => 'CouplesController@edit']);
Route::patch('couples/{couple}', ['as' => 'couples.update', 'uses' => 'CouplesController@update']);

/**
 * Admin only routes
 */
Route::group(['middleware' => 'admin'], function () {
    /**
     * Backup Restore Database Routes
     */
    Route::post('backups/upload', ['as' => 'backups.upload', 'uses' => 'BackupsController@upload']);
    Route::post('backups/{fileName}/restore', ['as' => 'backups.restore', 'uses' => 'BackupsController@restore']);
    Route::get('backups/{fileName}/dl', ['as' => 'backups.download', 'uses' => 'BackupsController@download']);
    Route::resource('backups', 'BackupsController');
});
