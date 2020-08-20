<?php
use App\Http\Resources\CommentCollection;
use App\Comment;
use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/getallcomments', function () {
    return new CommentCollection(Comment::latest()->paginate(4));
});
Route::apiResources(['create-comment'=>'API\CommentController']);
