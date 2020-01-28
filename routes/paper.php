<?php
// Маршруты для обработки запросов по конкурсным работам
Route::get('/paper', 'PaperController@index')->name('paper')->middleware('auth');
Route::get('/paper/create', 'PaperController@create')->name('paper.create');
Route::post('/paper', 'PaperController@store')->name('paper.store');
Route::get('/paper/{id}', 'PaperController@show')->name('paper.show');
Route::get('paper/{id}/download', 'PaperController@download')->name('paper.download');
