<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use anlutro\LaravelSettings\Facade as Setting;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Home',[
        'anyUseravailable'=>Gate::allows('auth user') // Returns a boolean if user is authenticated and passes it to the frontend
    ]);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('song/create', [SongController::class, "create"])->name('song.create')->middleware('guest');
Route::post('song', [SongController::class, "store"])->name('song.store')->middleware('guest');

Route::get('test', function(){
   
   return Str::of('adeyinka Ogunkoya')->slug('-');

    //dd(User::count());
});


Route::group(['middleware'=>'auth'], function() {
    
   // I dont need profile/{user}/edit becuase the user is already automtically being passed to the app 
   //Route::get('profile/{user}/edit', UserController::class , "edit");
   //Route::get('profile/edit', [UserController::class , 'edit'])->name('profile.edit');


    // route directly to an inertia component/page
Route::inertia('profile/update','Profile/UpdateProfileInformationForm')->name('profile.update');

Route::resource('users', UserController::class);
Route::resource('posts', PostsController::class);
    
});

Route::get('writesetting', function () {
    
    Setting::set('foo', 'bar');
    Setting::save();
    
});
