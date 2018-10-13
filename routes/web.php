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
Route::resource("questions", "QuestionController", ["only" => ["create", "store", "show"]]);

# sessions
Route::get("/login", ["as" => "login", "uses" =>  "SessionController@create"]);
Route::post("/login", "SessionController@store");
Route::get("/logout", ["as" => "logout", "uses" => "SessionController@destroy"]);

# answers
Route::get("/questions/:question_id/messages/create", ["as" => "answers.create", "uses" => "AnswerController@create"]);
Route::post("/questions/:question_id/messages", ["as" => "answers.store", "uses" => "AnswerController@store"]);

# messages
Route::get("/questions/:question_id/answer/:answer_id/messages/create", ["as" => "messages.create", "uses" => "MessageController@create"]);
Route::post("/questions/:question_id/answer/:answer_id/messages", ["as" => "messages.store", "uses" => "MessageController@store"]);
