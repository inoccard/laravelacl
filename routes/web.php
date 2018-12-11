<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix'=> 'painel'], function(){

    //PostController

    //RoleController

    //PainelController
    Route::get('/','Painel\PainelController@index');
});

Auth::routes();

Route::get('/', 'SiteController@index');