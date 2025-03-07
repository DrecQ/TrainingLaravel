<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class) -> group(function(){
    
Route::get('/', 'index' )->name('index');


Route::get('/{slug}-{id}', 'show') -> where([
    'id'=> '[0-9]+',
    'slug' => '[a-zA-Z0-9\-]+'
])->name('show');

});