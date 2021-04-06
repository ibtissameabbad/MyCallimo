<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');

   

});

Route::group(['prefix'=>'admin'],function(){
    Route::post('/add/user','API\UserController@store');
    Route::put('/edit/user','API\UserController@update');
    Route::delete('/delete/user/{id}','API\UserController@delete');
   

    Route::middleware('auth:api')->group(function () {
        Route::get('/user/{id}', 'API\UserController@show');
        Route::get('/users','API\UserController@index');
       

       
    });
    
});

//  Route::resources(['user' => 'API\UserController']);
Route::get('/annonceProcessed','AnnonceController@showAnnonceAtraiter');
Route::get('profile', 'API\UserController@profile');
Route::get('/admin', 'HomeController@index');
Route::get('/roles','API\UserController@roles');

Route::get('/getTeams/{id}', 'UserController@getTeams');

Route::get('/territoires', 'TerritoireController@index');
Route::get('/user','TerritoireController@users');
Route::get('/territoire/{id}','TerritoireController@show');
Route::post('/add/territoire','TerritoireController@store');
Route::put('/edit/territoire','TerritoireController@update');
Route::delete('/delete/territoire/{id}','TerritoireController@delete');

Route::get('/secteurs', 'SecteurController@index');
Route::get('/secteur/{id}','SecteurController@show');
Route::post('/add/secteur','SecteurController@store');
Route::put('/edit/secteur','SecteurController@update');
Route::delete('/delete/secteur/{id}','SecteurController@delete');


Route::get('/annonces','AnnonceController@index');
Route::get('/allAnnonces','AnnonceController@show');
Route::post('/add/userAnnonces','AnnonceController@dispatcher');
Route::get('/annoncesTraite','AnnonceController@userAnonces');
Route::get('/similarIds','AnnonceController@pushSimilarIds');
Route::post('/add/annonce','AnnonceController@store');
Route::put('/edit/annonce', 'AnnonceController@update');
Route::get('getAnnonceById/{id}','AnnonceController@getAnnonceById');

Route::get('/allTypeCall','AnnonceCallController@allTypeCall');
Route::post('/add/annonceCall/{id}', 'AnnonceCallController@store');


Route::get('/test','AnnonceCallController@test');
// Route::get('/sendMail','EmailController@sendMail');

Route::post('/sendmail', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
    $mailer
        ->to($request->input('email'))
        ->send(new \App\Mail\sendEmail($request->input('title')));
    return redirect()->back();
})->name('sendmail');


