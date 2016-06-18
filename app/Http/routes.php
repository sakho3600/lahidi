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

// Guest Route

Route::get('accueil',['as'=>'guest.accueil','uses'=>'GuestController@index']);

Route::get('promesses-president',['as'=>'guest.president','uses'=>'GuestController@president']);

Route::get('promesses-gouvernement',['as'=>'guest.gouvernement','uses'=>'GuestController@gouvernement']);

Route::get('mediatheque',['as'=>'guest.mediatheque','uses'=>'GuestController@media']);

Route::get('langues',['as'=>'guest.langues','uses'=>'GuestController@langues']);

Route::get('webactu',['as'=>'guest.webactu','uses'=>'GuestController@webactu']);

Route::get('rapports',['as'=>'guest.rapports','uses'=>'GuestController@rapports']);

Route::get('blog',['as'=>'guest.forum','uses'=>'GuestController@blog']);



// Dashbord  Route

Route::get('dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@index']);

// Engagement Ressource Route

Route::post('import',['uses'=>'EngagementController@importExcel','as'=>'engagement.importExcel']);
Route::post('export',['uses'=>'EngagementController@exportExcel','as'=>'engagement.exportExcel']);
Route::post('addEtat/{id}',['uses'=>'EngagementController@addEtat','as'=>'engagement.etat']);
Route::put('updateEtat/{id}',['uses'=>'EngagementController@updateEtat','as'=>'engagement.updateEtat']);
Route::delete('delteEtat/{id}',['uses'=>'EngagementController@deleteEtat','as'=>'engagement.deleteeEtat']);

Route::resource('engagement','EngagementController');

// Catégroie Ressource Route

Route::resource('categorie','CategorieController');

// Secteur Ressource Route

Route::resource('secteur','SecteurController');

// Etat Ressource Route

Route::resource('etat','EtatController');

// Commentaire Ressource Route

Route::resource('commentaire','CommentaireController');

// Article Ressource Route

Route::resource('article','ArticleController');

// Utilisateur Ressource Route

Route::resource('user','userController');

// Home & Authentification Route 

Route::auth();

Route::get('/home', 'HomeController@index');
