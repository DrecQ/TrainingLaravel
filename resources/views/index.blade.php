@extends('head')

@section('title', 'Acceuil du blog')
@section('content')

    <h2>Mon Blog</h2>
        {{"Ceci est mon premier contenu"}}
  
    @foreach ($posts as $post)
        <article>
            <h3>{{ $post->title }}</h3>
            <p>
                {{ $post->content }}
            </p>

            <p>
                <a href="{{ route('blog.show', [$post->slug, $post->id]) }}"  class="btn btn-info">Lire la suite</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links()}}

@endsection

