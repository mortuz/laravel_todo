<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new', [
    'uses'  => 'PagesController@new'
]);

Route::get('/todos', [
    'uses'  => 'TodosController@index',
    'as'    => 'todos'
]);

Route::get('/todo/delete/{id}', [
    'uses' => 'TodosController@delete',
    'as'    => 'todo.delete'
]);

Route::get('/todo/edit/{id}', [
    'uses'   => 'TodosController@edit',
    'as'    => 'todo.edit'
]);


Route::post('/todo/update/{id}', [
    'uses'   => 'TodosController@update',
    'as'    => 'todo.update'
]);

Route::post('/todo/create', [
    'uses'  => 'TodosController@create'
]);

Route::get('/todo/complete/{id}', [
    'uses'   => 'TodosController@complete',
    'as'    => 'todo.complete'
]);
