<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{PostController, UserController, CommentController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', [UserController::class, 'user']);
Route::middleware('auth:api')->get('/comments/create', [CommentController::class, 'create']);


Route::middleware('api')->get('/articles/{post}', [PostController::class, 'getComments']);

//http://laravel-vue-blog.test/api/articles/' + this.post_id