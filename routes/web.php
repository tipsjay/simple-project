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


Route::get('/',function(){
    return view('welcome'); //this is the welcome page
});




Route::patch('/tasks/{task}','ProjectTasksController@update');
Route::post('/projects/{project}/tasks','ProjectTasksController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('projects','ProjectsController'); /* instead of using those routes BELOW laravel provides this
                                                    'resource' if you just follow the naming convention*/

/*
  GET/projects(index)
  GET/projects/create(create)
  GET/projects/1(show)
  GET/projects/1/edit(edit)
  POST/projects/store
  PATCH/projects/1(update)
  DELETE/projects/1(destroy)
*/

// Route::post('/completed-tasks/{task}','CompletedTasksController@store');
// Route::delete('/completed-tasks/{task}','CompletedTasksController@destroy');

// Route::get('/projects','ProjectsController@index');
// Route::get('/projects/create','ProjectsController@create');
// Route::get('/projects/{projects}','ProjectsController@show');
// Route::get('/projects/{projects}/edit','ProjectsController@edit');
// Route::post('/projects','ProjectsController@store');
// Route::patch('/projects/{project}','ProjectsController@update');
// Route::delete('/projects/{project}','ProjectsController@destroy');
