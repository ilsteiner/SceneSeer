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

Route::get('scene/create', function () {
    return view('scene.create');
});

Route::get('play/all', function () {
    return App\Play::all();
});

Route::get('playwright/all', function () {
    return App\Playwright::all();
});

Route::get('play/{play_id}/playwright', function ($play_id) {
    return App\Play::find($play_id)->playwright;
});

Route::get('play/{play_id}/characters', function ($play_id) {
    return App\Play::find($play_id)->characters;
});

Route::get('playwright/{playwright_id}/characters', function ($playwright_id) {
    return App\Playwright::find($playwright_id)->characters;
});

Route::get('playwright/{playwright_id}/plays', function ($playwright_id) {
    return App\Playwright::find($playwright_id)->plays;
});

Route::post('scene/save', function (Request $request) {
    Scene::store($request);
    return ("It worked!");
});

// Resource routes
Route::resource('playwright', 'PlaywrightController');
Route::resource('play', 'PlayController');
