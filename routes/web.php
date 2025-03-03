<?php

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

Route::prefix('/blog')->name('blog.') -> group(function(){
    
Route::get('/', function(Request $request){


    return Post::paginate();

    return [
        "link" => \route('blog.show', ['slug' =>'article', 'id' => 13]),
    ];
})->name('index');


Route::get('/{slug}-{id}', function ( string $slug, string $id, Request $request){
    return [
        'id' => $id,
        'slug' => $slug,
        'name' => $request->input('name'),
    ];
}) -> where([
    'id'=> '[0-9]+',
    'slug' => '[a-zA-Z0-9\-]+'
])->name('show');

});