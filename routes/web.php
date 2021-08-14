<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('Connexion');
});

Route::get('/Connexion','AccueilController@Connexion')->name('connexion');
Route::get('/Profil', 'WelcomeController@Profil')->name('Profil');
Route::get('/deconnexion', 'WelcomeController@Deconnexion')->name('deconnexion');
Route::get('/accueil', 'AccueilController@PageAccueil')->name('accueil');
Route::get('/creationParcours', 'AccueilController@PageParcours')->name('creationParcours');
Route::post('/verifConnexion', 'WelcomeController@VerifConnexion')->name('verifConnexion');
Route::post('/creerParcour','ParcoursController@CreerParcour')->name('creerParcour');
Route::post('/creerJeu','JeuController@CreerJeu')->name('creerJeu');
Route::post('/choisirParcours/{id}', 'AccueilController@GetParcoursByCreator')->name('choisirParcours');
Route::get('/creerStep/{id}','StepController@GetStepByParcours')->name('creerStep');
// Route::post('/creerStepName', 'StepController@AddStepFromName')->name('creerStepName');
// Route::post('/creerStepCoords', 'StepController@AddStepFromCoords')->name('creerStepCoords');
Route::post('/creerStepAll','StepController@AddStep')->name('creerStepAll');
Route::get('/deleteStep{id}','StepController@deleteStep')->name('deleteStep');
Route::get('/deleteRoute/{id}','ParcoursController@deleteRoute')->name('deleteRoute');
Route::get('/deleteJeu/{id}','JeuController@DeleteJeu')->name('deleteJeu');
Route::get('/creationEquipe', 'EquipeController@viewEquipe')->name('creationEquipe');
Route::get('/afficherEquipe/{id}', 'EquipeController@viewEquipe')->name('afficherEquipe');
Route::get('/creationJeu','JeuController@CreationJeu')->name('creationJeu');

Route::post('/creerEquipe/{id}', 'EquipeController@creerEquipe')->name('creerEquipe');

Route::get('/map', function () {
    return view('map');
});

Route::get('/suppEquipe/{id}', 'EquipeController@suppEquipe')->name('suppEquipe');
// Route::get('/suppEquipe/{id}', function ($idEquipe) {
//     session_start();
//     DB::table('EQUIPE')->where('ID', $idEquipe)->delete();
//     return back();
// })->name('suppEquipe');
//verifirer sur appartenir car si des jouers appartiennent à une équipe on ne peut pas sup la base


Route::get('/test', function () {
    return 'Bonjour SIO';
});

Route::get('/afficherJoueur/{id}', 'JoueurController@afficherJoueur')->name('afficherJoueurEquipe');
Route::get('/AjouterJoueur/{idJoueur}/{idEquipe}', 'JoueurController@ajouterJoueur')->name('ajouterJoueur');
Route::get('/SuppJoueur/{idJoueur}/{idEquipe}', 'JoueurController@suppJoueur')->name('suppJoueur');
// Route::post('/creerJoueur/{id}', 'JoueurController@creerJoueur')->name('creerJoueur');
// Route::post('/creerCapitaine', 'JoueurController@creerCapitaine')->name('creerCapitaine');
Route::get('/afficherMission', 'MissionController@AffichageMision')->name('afficherMission');
Route::get('/Mission/{id}','MissionController@Mission')->name('Mission');
Route::get('/listeMission/{id}','MissionController@GetMission')->name('listeMission');
Route::post('/creerMission', 'MissionController@createMission')->name('creerMission');
Route::get('/deleteMission/{id}','MissionController@deleteMission')->name('deleteMission');
Route::post('/AjoutMission/{id}','MissionController@AjouterMission')->name('AjoutMission');
Route::get('/VoirParcours/{id}','StepController@VoirParcours')->name('VoirParcours');
Route::get('/VoirMission/{id}','MissionController@VoirMission')->name('VoirMission');
Route::post('/choixMusique/{id}', 'JoueurController@choixMusique')->name('choixMusique');

