<?php


Route::apiResource('/questions', 'QuestionController');
Route::apiResource('/categories', 'CategoryController');
Route::apiResource('/question/{question}/replies', 'ReplyController');


