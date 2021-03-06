<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');

Route::get('index','GuestController@home');
Route::get('test','GuestController@test');

// Guest Route

Route::get('accueil',['as'=>'guest.accueil','uses'=>'GuestController@index']);

Route::get('toutes-les-promesses',['as'=>'guest.promesses','uses'=>'GuestController@promesses']);

Route::get('promesses-gouvernement',['as'=>'guest.gouvernement','uses'=>'GuestController@gouvernement']);

Route::get('mediatheque',['as'=>'guest.media','uses'=>'GuestController@media']);

Route::get('langues',['as'=>'guest.langues','uses'=>'GuestController@langues']);

Route::get('webactu',['as'=>'guest.webactu','uses'=>'GuestController@webactu']);

Route::get('rapports',['as'=>'guest.rapports','uses'=>'GuestController@rapports']);

Route::get('blog',['as'=>'guest.blog','uses'=>'GuestController@blog']);

Route::get('detail-promesse/{slug}',['as'=>'guest.engagementDetail','uses'=>'GuestController@show']);

Route::get('detail-article/{slug}',['as'=>'guest.article','uses'=>'GuestController@articleShow']);

Route::get('telechargement/{name}',['as'=>'guest.download','uses'=>'GuestController@downloadDoc']);

// Route::post('promesses-filtre',['as'=>'guest.promessesfilter','uses'=>'GuestController@promessesFilter']);

Route::get('promesses-filtre',['as'=>'guest.promesssefilter','uses'=>'GuestController@promessesFilter']);

Route::get('participer',['as'=>'guest.participer','uses'=>'GuestController@formParticiper']);



// Dashbord  Route

Route::get('pw-admin-dashboard',['as'=>'pw-admin-dashboard.index','uses'=>'DashboardController@index']);

// Engagement Ressource Route

Route::post('import',['uses'=>'EngagementController@importExcel','as'=>'pw-admin-engagement.importExcel']);
Route::post('export',['uses'=>'EngagementController@exportExcel','as'=>'pw-admin-engagement.exportExcel']);
Route::post('addEtat/{id}',['uses'=>'EngagementController@addEtat','as'=>'pw-admin-engagement.etat']);
Route::put('updateEtat/{id}',['uses'=>'EngagementController@updateEtat','as'=>'pw-admin-engagement.updateEtat']);
Route::delete('delteEtat/{id}',['uses'=>'EngagementController@deleteEtat','as'=>'pw-admin-engagement.deleteEtat']);

Route::resource('pw-admin-engagement','EngagementController');

// Catégroie Ressource Route

Route::resource('pw-admin-categorie','CategorieController');

// Secteur Ressource Route

Route::resource('pw-admin-secteur','SecteurController');

// Etat Ressource Route

Route::resource('pw-admin-etat','EtatController');

// Commentaire Ressource Route

Route::resource('pw-admin-commentaire','CommentaireController');

// Article Ressource Route

Route::resource('pw-admin-article','ArticleController');

// Utilisateur Ressource Route

Route::resource('pw-admin-user','UserController');

// Home & Authentification Route 

Route::auth();

Route::get('/home', 'HomeController@index');


