<?php

use App\Permission;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\PublicJobsController;
use App\Http\Controllers\Admin\CommentController;
//use Symfony\Component\Routing\Annotation\Route;

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
Route::group(array(), function(){
    Route::get('/', "PublicJobsController@home");

    Route::get('/jobs', "PublicJobsController@index");
    Route::get('jobs/{id}', "PublicJobsController@view");
    Route::get('/category/{id}', "PublicJobsController@viewCategory");
    Route::get("jobs/{id?}/apply", "PublicJobsController@apply")->name('apply');
    Route::get('/{id}/profile', "PublicJobsController@profile")->name('user.profile');
    Route::get('/{id}/edit', "PublicJobsController@editUser")->name("user.edit") ;
    Route::post('/{id}/edit', "PublicJobsController@update")->name("user.update");
    Route::post('/comment', "PublicJobsController@comment");
});



Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), 
    function(){
        Route::get('/', 'UsersController@home' )->name('dashboard.index');
        Route::get('users/{id?}/edit', 'UsersController@edit');
        Route::post('users/{id?}/edit', "UsersController@update");
        Route::post('users{id?}/delete', 'UsersController@delete');
        Route::get('users/create', 'UsersController@create');
        Route::post('users/create', 'UsersController@store');

        Route::get('roles', 'RolesController@index');
        Route::get('roles/create', 'RolesController@create');
        Route::post('roles/create', 'RolesController@store');

        Route::get('category', 'CategoriesController@index');
        Route::get('category/create', 'CategoriesController@create');
        Route::post('category/create', 'CategoriesController@store');
        Route::post('category/{id?}/delete', 'CategoriesController@delete');

        Route::get('jobs', 'JobsController@index');
        Route::get('jobs/create', 'JobsController@create');
        Route::post('jobs/create', 'JobsController@store');
        Route::get('jobs/{id?}/edit', 'JobsController@edit');
        Route::post('jobs/{id?}/edit', 'JobsController@update');
        Route::post('jobs/{id?}/delete', 'JobsController@delete');

        Route::get('/comment', "CommentController@index" )->name('comment.index');
        Route::post('/comment/{id}/delete', "CommentController@destroy" );

        Route::get('perms/create', 'PermissionController@create');



    });
