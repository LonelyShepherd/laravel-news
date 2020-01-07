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

use Illuminate\Support\Arr;

// Route::get('/', function () {
//     $niza = array(
//         array(5, 1.25, 15),
//         array('unknown', 0.75, 25, array(2, 'bla', 5)),
//         array(array('text'), 1.15, 7)
//     );

//     $filtered = array_filter(Arr::flatten($niza), function ($item) {
//         return is_numeric($item);
//     });

//     sort($filtered);

//     print_r(array_slice($filtered, 0, 2));

//     return view('welcome');
// });

// 1. da se vidi kako se ukljucue laravel auth
// 2. action poruke preko sesiju (flash)
// 3. kako se citav erori od validaciju

Route::get('/', 'NewsController@top');
Route::get('/news/{id}/upvote', 'NewsController@upvote');
Route::get('/news/{id}/downvote', 'NewsController@downvote');
Route::get('/news/{post}', 'NewsController@post');

Route::get('/newss/create', 'NewsController@create');
Route::post('/news/store', 'NewsController@store');

Route::get('/newss/{post}/edit', 'NewsController@edit');
Route::put('/news/{post}/update', 'NewsController@update');

Route::delete('/news/{post}/delete', 'NewsController@delete');

Route::get('/newss/top', 'NewsController@discussed');

Route::post('/news/{post}/comments/new', 'CommentController@store');
