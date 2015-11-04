<?php

Route::get('/', function () {
	return view('spark::welcome');
});

Route::resource('cpds', 'CpdsController');
Route::get('cpds/purchase/{id}', 'CpdsController@purchase');

Route::get('home', ['middleware' => 'auth', function () {
	if (! auth()->user()->credits) {
        auth()->user()->credits()->create([
            'balance' => 500
        ]);
        return redirect()->route('cpds.index');
    }
	return view('home');
}]);
