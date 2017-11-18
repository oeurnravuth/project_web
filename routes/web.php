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

Route::get('/', [
    'middleware'=>'auth',
    'uses' => 'DashboardController@getAll',
    'as' => 'admin.dashboard.list'
]);

Auth::routes();

Route::group(['prefix' => '/admin','middleware'=>'auth'], function () {

    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', [
            'uses' => 'DashboardController@getAll',
            'as' => 'admin.dashboard.list'
        ]);

    });

    Route::group(['prefix' => '/contents','middleware'=>'auth_author'], function () {
        
        Route::get('list', [
            'uses' => 'ContentController@getAll',
            'as' => 'admin.contents.list'
        ]);

        Route::get('get_add_new', [
            'uses' => 'ContentController@getInsertOne',
            'as' => 'admin.contents.get_add_new'
        ]);

        Route::post('post_add_new', [
            'uses' => 'ContentController@postInsertOne',
            'as' => 'admin.contents.post_add_new'
        ]);

        Route::get('get_edit/{id}', [
            'uses' => 'ContentController@getUpdateOneById',
            'as' => 'admin.contents.get_edit'
        ]);

        Route::post('post_edit/{id}', [
            'uses' => 'ContentController@postUpdateOneById',
            'as' => 'admin.contents.post_edit'
        ]);

        Route::get('show/{id}', [
            'uses' => 'ContentController@findOneById',
            'as' => 'admin.contents.show'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'ContentController@deleteOneById',
            'as' => 'admin.contents.delete'
        ]);

        Route::get('/status/{id}', [
            'uses' => 'ContentController@toggleStatusById',
            'as' => 'admin.contents.status'
        ]);

        Route::get('/active_multi/{id}', [
            'uses' => 'ContentController@activeMultiById',
            'as' => 'admin.contents.active_multi'
        ]);

        Route::get('/deactive_multi/{id}', [
            'uses' => 'ContentController@deactiveMultiById',
            'as' => 'admin.contents.deactive_multi'
        ]);

        Route::get('/delete_multi/{id}', [
            'uses' => 'ContentController@deleteMultiById',
            'as' => 'admin.contents.delete_multi'
        ]);
    });

    Route::group(['prefix' => '/users','middleware'=>'auth_admin'], function () {

        Route::get('list', [
            'uses' => 'UserController@getAll',
            'as' => 'admin.users.list'
        ]);

        Route::get('get_add_new', [
            'uses' => 'UserController@getInsertOne',
            'as' => 'admin.users.get_add_new'
        ]);

        Route::post('post_add_new', [
            'uses' => 'UserController@postInsertOne',
            'as' => 'admin.users.post_add_new'
        ]);

        Route::get('get_edit/{id}', [
            'uses' => 'UserController@getUpdateOneById',
            'as' => 'admin.users.get_edit'
        ]);

        Route::post('post_edit/{id}', [
            'uses' => 'UserController@postUpdateOneById',
            'as' => 'admin.users.post_edit'
        ]);

        Route::get('show/{id}', [
            'uses' => 'UserController@findOneById',
            'as' => 'admin.users.show'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'UserController@deleteOneById',
            'as' => 'admin.users.delete'
        ]);

        Route::get('/status/{id}', [
            'uses' => 'UserController@toggleStatusById',
            'as' => 'admin.users.status'
        ]);

        Route::get('/active_multi/{id}', [
            'uses' => 'UserController@activeMultiById',
            'as' => 'admin.users.active_multi'
        ]);

        Route::get('/deactive_multi/{id}', [
            'uses' => 'UserController@deactiveMultiById',
            'as' => 'admin.users.deactive_multi'
        ]);

        Route::get('/delete_multi/{id}', [
            'uses' => 'UserController@deleteMultiById',
            'as' => 'admin.users.delete_multi'
        ]);

        Route::get('/set_role/{userId}/{roleId}', [
            'uses' => 'UserController@setUserRole',
            'as' => 'admin.users.set_role'
        ]);

        Route::get('/change_password', [
            'uses' => 'UserController@getChangePassword',
            'as' => 'auth.change_password'
        ]);

        Route::post('/change_password', [
            'uses' => 'UserController@postChangePassword',
            'as' => 'auth.change_password'
        ]);


    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/401', function (){
    return view('errors.401');
});
