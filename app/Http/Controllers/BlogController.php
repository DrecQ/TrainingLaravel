<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\http\RedirectResponseInterface;
use Illuminate\Contracts\Pagination\Paginator;

class BlogController extends Controller
{
    public function index()
    {
        $post = Post::paginate(25);
        return $post; 

    }

    public function show(string $slug, string $id)
    {
        $post = Post::findOrFail($id);

        if($post->slug !== $slug)
        {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
    
        return $post;
    }
}
