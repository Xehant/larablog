@extends('layout')

@section('title', 'Accueil')

@section('content')
    <h1>Page d'accueil du site</h1>
    
    <section>
        <h2>Les 5 derniers articles</h2>
        
        @foreach($posts as $post)
            <article>
                <header>
                    <h3>{{ $post->title }}</h3>
                    <small>Rédigé par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
                </header>
                {{ $post->content }}
            </article>
        @endforeach
    </section>
@endsection