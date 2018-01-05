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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/main', function () {
    return view('main');
});


//Route::get('/MainBoard', 'MainBoardController@create')->name('Mainboard.create');
//Route::post('MainBoard')
//
//Route::resource('Card','CardController');


Auth::routes();

Route::get('/mainBoard', 'MainBoardController@index')->name('mainBoard.index');
Route::get('/mainBoard/add', 'MainBoardController@create')->name('mainBoard.add');
Route::post('/mainBoard/store', 'MainBoardController@store')->name('mainBoard.store');

Route::get('/mainBoard/{id}/card', 'CardController@index')->name('card.index');
Route::get('/mainBoard/{id}/card/add', 'CardController@create')->name('card.add');
Route::get('/mainBoard/{id}/card/store', 'CardController@store')->name('card.store');
Route::get('/mainBoard/card/taskstore', 'CardController@taskstore')->name('card.taskstore');
Route::get('/mainBoard/card/updatetask', 'CardController@updatetask')->name('card.updatetask');
Route::get('/mainBoard/card/updatestatus', 'CardController@updatestatus')->name('card.updatestatus');
Route::get('/mainBoard/card/deletetask', 'CardController@deletetask')->name('card.deletetask');
Route::get('/mainBoard/card/updatetaskcontent', 'CardController@updatetaskcontent')->name('card.updatetaskcontent');
Route::get('/mainBoard/card/updatecardcontent', 'CardController@updatecardcontent')->name('card.updatecardcontent');




//Route::get('/mainBoard/{id}/card/task', 'TaskController@index')->name('task.index');
//Route::get('/mainBoard/{id}/card/task/add', 'TaskController@create')->name('task.add');
//Route::get('/mainBoard/card/task/store', 'TaskController@store')->name('task.store');