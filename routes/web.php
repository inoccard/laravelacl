<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'painel'], function(){

    //PostController
    Route::get('posts','Painel\PostController@index');
    
    //RoleController
    Route::get('roles','Painel\RoleController@index');
    Route::get('role/{id}/permissions','Painel\RoleController@permissions');

    //PainelController
    Route::get('/','Painel\PainelController@index');
    
    //PermissionsController
    Route::get('permissions','Painel\PermissionController@index');
    Route::get('permission/{id}/roles','Painel\PermissionController@roles');

    //UserController
    Route::get('users','Painel\UserController@index');
});

Auth::routes();

Route::get('/', 'Portal\SiteController@index');