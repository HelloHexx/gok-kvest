<?php

use Illuminate\Support\Facades\Route;
use App\Marker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User_Class\c_response;
Use App\Comments;
use Illuminate\Support\Facades\DB;


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
//Главная страница
Route::get('/', function (Request $request) {
    $markers=Marker::all();//Получаем данные о всех координатах из БД
    $comm = Comments::where('id','>', '0')->orderBy('created_at','desc')->take(5)->get();
    return view('index',compact('markers','comm'));
});

Route::get('/set_cookie/{response}/{cookie_name}',"ResponseController@SetCookie");


Route::get('/startgame','GameController@GameInit');
Route::get('/game','GameController@GameView');

Route::get('/task/{id}','GameController@TaskControll');

Route::get('/getmarkers','GameController@GetMarkers');
Route::get('/endgame','GameController@EndGame');
Route::get('/checkcode','GameController@CheckCode');
Route::get('/checkanswer','GameController@CheckAnswer');
Route::get('/newgame','GameController@NewGame');
Route::get('/info/{id}','GameController@MarkerView');
Route::get('/skip','GameController@Skip');

Route::get('/short','GameController@Short');
Route::get('/long','GameController@Long');

Route::get('/politica',function(){
   return view('politica'); 
});


Route::get('/visit','CookieController@Visit');
Route::post('/add_comm','CommentController@Add');
Auth::routes();

Route::get('/home', 'GameController@GameView')->name('home');
