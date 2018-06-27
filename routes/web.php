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
Route::get("/", ["as" => "root", "uses" => "SandboxController@show"]);

# users
Route::resource("users", "UserController", ["only" => ["create", "store"]]);
Route::resource("questions", "QuestionController", ["only" => ["create", "store"]]);

# sessions
Route::get("/login", "SessionController@create");
Route::post("/login", "SessionController@store");
Route::get("/logout", "SessionController@destroy");
