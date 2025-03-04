<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Contracts\Pagination\Paginator;

class BlogController extends Controller
{
    public function index()
    {
        
        return view('index', [
            
            'posts' => Post::paginate(1)

        ]); 

    }

    public function show(string $slug, string $id) : RedirectResponse | View 
    {
        $post = Post::findOrFail($id);

        if($post->slug !== $slug)
        {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
    
        return view('show',['post' => $post]);
    }
}
