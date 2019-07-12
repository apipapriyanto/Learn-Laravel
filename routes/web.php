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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/seed', function(App\Post $post) {
    $faker = \Faker\Factory::create();

    foreach (range(1, 10) as $x ) {
        $post->create([
            'title' => $faker->sentence(5),
            'content' => $faker->sentence(10)
        ]);
    }
});

Route::get('/post', 'PostController@index');