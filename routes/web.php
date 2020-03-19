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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/district', 'DashboardController@district')->name('district');
Route::get('/division', 'DashboardController@division')->name('division');

Route::get('/designation', 'DashboardController@designation')->name('designation');
Route::get('/gender', 'DashboardController@gender')->name('gender');
Route::get('/highesttraining', 'DashboardController@highesttraining')->name('highesttraining');
Route::get('/maxtrainner', 'DashboardController@maxtrainner')->name('maxtrainner');
Route::get('/ongoingtraining', 'DashboardController@ongoingtraining')->name('ongoingtraining');
Route::get('/participant', 'ParticipantsController@index')->name('participants');
Route::post('/participantupdae', 'ParticipantsController@update')->name('participant_update');
Route::get('/batchlist', 'ParticipantsController@batchlist')->name('participant_batchlist');
Route::get('/batchlist/edit/{id}', 'ParticipantsController@batchlistedit')->name('participant_batchlistedit');
Route::post('/batchlist/update/{id}', 'ParticipantsController@updatebatch')->name('participant_batchlistupdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

    Route::get('training/{slug}', 'TrainingController@ongoing')->name('ongoing');
    Route::get('participants', 'ParticipantController@index')->name('participantlist');
    Route::get('participant/{id}', 'ParticipantController@details')->name('participant.details');
    Route::get('trainers', 'TrainerController@index')->name('trainer.index');
    Route::get('trainingcenter', 'TrainingCenterController@index')->name('center.index');
    Route::get('trainingcenter/{id}', 'TrainingCenterController@details')->name('center.details');
    Route::get('/training', 'DashboardController@training')->name('training');
});
