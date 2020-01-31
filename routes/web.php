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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
    'uses' => 'UserController@getLogin',
    'as' => 'user.login'
]);

// Ajax
Route::post('genSsid', 'AjaxController@genSsid');
Route::post('chkAuth', 'AjaxController@chkAuth');
Route::post('getRegID', 'AjaxController@getRegID');
Route::post('restartDevID', 'AjaxController@restartDevID');
Route::post('getChangeID', 'AjaxController@getChangeID');



Route::group(['prefix' => 'user'], function () {

    // Route::get('/profile', [
    //     'uses' => 'UserController@getProfile',
    //     'as' => 'user.profile'
    // ]);


    // Route::group(['middleware' => 'auth'], function () {

    // ユーザープロファイル
    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);

    // ログアウト
    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
    // });

    Route::get('/stopauthmail', [
        'uses' => 'UserController@getStopauthmail',
        'as' => 'user.sendMail'
    ]);

    Route::get('/restartauthmail', [
        'uses' => 'UserController@getRestartauthmail',
        'as' => 'user.sendMail'
    ]);

    Route::post('/stopauthmail', [
        'uses' => 'UserController@postStopauthmail',
        'as' => 'user.stopauthmail'
    ]);

    Route::post('/restartauthmail', [
        'uses' => 'UserController@postRestartauthmail',
        'as' => 'user.restartauthmail'
    ]);

    Route::get('/restartproc', [
        'uses' => 'UserController@getRestartproc',
        'as' => 'user.restartproc'
    ]);

    Route::post('/restartproc', [
        'uses' => 'UserController@postRestartproc',
        'as' => 'user.restartproc'
    ]);

    Route::get('/stopproc', [
        'uses' => 'UserController@getStopproc',
        'as' => 'user.stopproc'
    ]);

    Route::post('/stopproc', [
        'uses' => 'UserController@postStopproc',
        'as' => 'user.stopproc'
    ]);

    Route::get('/changeDev', [
        'uses' => 'UserController@getChangeDev',
        'as' => 'user.changeDev'
    ]);

    Route::post('/changeDev', [
        'uses' => 'UserController@postChangeDev',
        'as' => 'user.changeDev'
    ]);

    Route::get('/editProfile', [
        'uses' => 'UserController@getEditProfile',
        'as' => 'user.editProfile'
    ]);

    Route::post('/editProfile', [
        'uses' => 'UserController@postEditProfile',
        'as' => 'user.editProfile'
    ]);

    Route::group(['middleware' => 'guest'], function () {

        // ---------------------------------------------------------
        Route::get('/regUser', [
            'uses' => 'UserController@getregUser',
            'as' => 'user.regUser'
        ]);

        Route::post('/regUser', [
            'uses' => 'UserController@postregUser',
            'as' => 'user.regUser'
        ]);
        // ---------------------------------------------------------

        // ログイン
        Route::get('/login', [
            'uses' => 'UserController@getLogin',
            'as' => 'user.login'
        ]);

        Route::post('/login', [
            'uses' => 'UserController@postLogin',
            'as' => 'user.login'
        ]);

    });


});

// default 'en'
