<?php

Route::get('/pages/index', function () {
    return view('pages/index');
});

Route::get('/', 'PropertiesController@pagesindex');
Route::get('/pages/index', 'PropertiesController@pagesindex');
Route::get('/properties/index', 'PropertiesController@index');

// views were showing blank with this:
Route::resource('properties', 'PropertiesController');
// used cmd on project folder: sudo chmod -R 777 bootstrap/cache storage

// Protected routes from non auth users i.e. only admin can view
Route::get('/properties/create', function () {
    return view('properties/create');
})->middleware('auth');

Route::get('/properties/edit', function () {
    return view('properties/edit');
})->middleware('auth');



Route::post('/properties/cities/nicosia', 'PropertiesController@nicosia');
Route::post('/properties/cities/larnaca', 'PropertiesController@larnaca');
Route::post('/properties/cities/ammochostos', 'PropertiesController@ammochostos');
Route::post('/properties/cities/limassol', 'PropertiesController@limassol');
Route::post('/properties/cities/pafos', 'PropertiesController@pafos');

Route::get('/properties/cities/nicosia', 'PropertiesController@nicosia');
Route::get('/properties/cities/larnaca', 'PropertiesController@larnaca');
Route::get('/properties/cities/ammochostos', 'PropertiesController@ammochostos');
Route::get('/properties/cities/limassol', 'PropertiesController@limassol');
Route::get('/properties/cities/pafos', 'PropertiesController@pafos');

Auth::routes();
Route::get('/home', 'AdminPanelController@index')->name('home'); /* admin-panel.blade.php */








