<?php
require('paper.php');
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



//Route::get('/profile_contestant', 'ProfileContestantController@index')->name('contestant')->middleware('auth');
//Route::get('/profile_contestant/{id}/edit', 'ProfileContestantController@edit')->name('contestant.edit');
//Route::put('/profile_contestant/{id}', 'ProfileContestantController@update')->name('contestant.update');

Route::middleware(['auth'])->name('')->group(function () {
// Маршруты для конкурсанта
Route::get('/redirect', 'ProfileController@redirect')->name('redirect');
Route::get('/profile_contestant', 'ProfileController@index')->name('contestant');
Route::get('/profile_contestant/{id}/edit', 'ProfileController@edit')->name('contestant.edit');
Route::put('/profile_contestant/{id}', 'ProfileController@update')->name('contestant.update');

// Маршруты для эксперта
Route::get('/profile_expert', 'ProfileController@index')->name('expert')->middleware('auth');
Route::get('/profile_expert/{id}/edit', 'ProfileController@edit')->name('expert.edit');
Route::put('/profile_expert/{id}', 'ProfileController@update')->name('expert.update');
Route::get('/profile_expert/works', 'ProfileController@works')->name('expert.works');
});

//Создал 26.03.2019 Маршруты для консультационной поддержки
Route::get('/consulting_support', 'ConsultingSupportController@index')->name('consulting');
Route::post('/consulting_support', 'ConsultingSupportController@store')->name('consulting.store');

//Создал 26.03.2019 Маршруты для политики конфиденциальности
Route::get('/privacy_policy', 'PrivacyPolicyController@index')->name('privacy');

//Создал 26.03.2019 Маршруты для полного текста требований
Route::get('/requirement_text', 'RequirementTextController@index')->name('requirement');

// Маршруты для процесса рецензирования работы
Route::get('/reviewing', 'ReviewingController@index')->name('reviewing');
Route::get('/reviewing/create/{id}', 'ReviewingController@create')->name('reviewing.create');
Route::get('/reviewing/{id}', 'ReviewingController@show')->name('reviewing.show');
Route::get('/reviewing/{id}/edit', 'ReviewingController@edit')->name('reviewing.edit');
Route::post('/reviewing', 'ReviewingController@store')->name('reviewing.store');
Route::put('/reviewing/{id}', 'ReviewingController@update')->name('reviewing.update');

Route::get('/listOfWorks', 'ListOfWork@index')->name('listOfWorks');
Route::get('/listOfWorks/{id}', 'ListOfWork@show')->name('listOfWorks.show');

// Маршруты для отображения уведомлений
Route::middleware(['auth'])->name('')->group(function () {

Route::get('/notification', 'NotificationController@index')->name('notification');
Route::get('/notification/create/{id}', 'NotificationController@create')->name('notification.create');
Route::get('/notification/{id}', 'NotificationController@show')->name('notification.show');
Route::get('/notification/{id}/edit', 'NotificationController@edit')->name('notification.edit');
Route::post('/notification', 'NotificationController@store')->name('notification.store');
Route::put('/notification/{id}', 'NotificationController@update')->name('notification.update');

});


// Маршруты для отображения голосов ("лайков"")
Route::middleware(['auth'])->name('')->group(function () {

Route::get('/vote', 'VoteController@index')->name('vote');
Route::get('/vote/create/{id}', 'VoteController@create')->name('vote.create');
Route::get('/vote/{id}', 'VoteController@show')->name('vote.show');
Route::get('/vote/{id}/edit', 'VoteController@edit')->name('vote.edit');
Route::post('/vote', 'VoteController@store')->name('vote.store');
Route::put('/vote/{id}', 'VoteController@update')->name('vote.update');

});

Route::get('/popular_works', 'PopularWorkController@index')->name('popular');




//     Route::get('/', 'NewsController@index');

//     Route::get('/create', 'NewsController@create');

//     Route::get('/{id}', 'NewsController@show');

//     Route::get('/{id}/edit', 'NewsController@edit');

//     Route::post('/', 'NewsController@store')->name('store');

//     Route::put('/{id}', 'NewsController@update')->name('update');

//     Route::delete('/{id}', 'NewsController@destroy');













