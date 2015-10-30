<?php

Route::group(['prefix' => 'faveosms', 'namespace' => 'Modules\FaveoSms\Http\Controllers'], function()
{
	Route::get('/', 'FaveoSmsController@index');
        Route::post('postsms','FaveoSmsController@PostSms');
});