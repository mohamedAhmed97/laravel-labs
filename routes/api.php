<?php
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//blog & author
Route::group(['middleware' => 'auth:sanctum'], function () {
    //authors
    Route::get('authors','API\AuthorApi@show'); 
    //blogs
    Route::get('blogs','API\BlogApi@show'); 
    //blog
    Route::get('blogs/{id}','API\BlogApi@show_blog'); 
    //create blog
    Route::post('blogs/create', 'API\BlogApi@store');
});
///login api
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
