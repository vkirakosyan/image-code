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


Route::resource('team', 'TeamController');
Route::resource('portfolio', 'PortfolioController');
Route::resource('photosesia', 'PhotosesiaController');
Route::resource('training', 'TrainingController');
Route::resource('servises', 'ServicesController');
Route::resource('contakt', 'ContaktController');
Route::resource('cotegory', 'CategoryController');
Route::resource('contact', 'ContactController');
Route::resource('lookbook', 'LookbookController');
Route::resource('lookbook_img', 'LookbookimgController');
Route::resource('programs', 'ProgramsController');
Route::resource('events', 'EventsController');
Route::resource('previous', 'PreviousController');
Route::resource('albome', 'AlbomeController');
Route::resource('training_category','TrainingCategoryController');
Route::resource('team_category','TeamCategoryController');
Route::resource('dashbord_text','DashbordTextController');
Route::resource('about','AboutController');
Route::resource('slide','SlideController');
Route::resource('lookbook_category','LookBookCategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'UserController@index');
Route::get('/teams/{id?}', 'UserController@teams');
Route::get('/service/{id}', 'UserController@servis');
Route::get('/user_lookbook/{id}', 'UserController@lookbook');
Route::get('/proects/{id}', 'UserController@proects');
Route::get('/user_training/{id?}', 'UserController@UserTraining');
Route::get('/user_contact', 'UserController@UserContact');
Route::get('/portfolio_team/{id}', 'UserController@UserPortfolio');
Route::get('/lang/{lang}/{page?}/{id?}', 'LanguigeController@lang');
Route::get('/user_about', 'UserController@UserAbout');
Route::get('/service', 'UserController@UserService');

