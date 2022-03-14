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

use App\Post;
use App\User;

Route::get('/eloquent', function(){
    #$posts = Post::all(); //Manda a llamar a todos los archivos
    $posts = Post::where('id', '>=', '20')//Manda a llamar solo a los numero de ID mayor o igual a 20
    ->orderBy('id','desc')// Ordena de mayor a menor
    ->take(3)//Petrmite llamar solo a un número determinado de registros
    ->get(); 


    foreach($posts as $post){
        echo "$post->id $post->title <br>";
    }
});


Route::get('/posts', function(){
    $posts = Post::get(); 


    foreach($posts as $post){
        echo "
        $post->id
        <strong>{$post->user->name}</strong>
        $post->title <br>";
    }
});

Route::get('/users', function(){
    $users = User::all();   

    foreach($users as $user){
        echo "
        $user->id
        <strong>$user->name</strong>
        {$user->posts->count()} posts <br>";
    }
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
