<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Laravel - @yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('posts.index') }}">Liste des articles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link">Créer un nouvel article</a>
                            
                        </li>
                        @auth
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">Déconnexion</a>
    </li>
@endauth
@guest
    <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">Connexion</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('register') }}" class="nav-link">Inscription</a>
    </li>
@endguest
                    </ul>
                </div>
            </nav>
        </header>
        
        <main class="container">
            @yield('content')
        </main>
    </body>
</html>
