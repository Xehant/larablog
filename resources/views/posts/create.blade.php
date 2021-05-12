@extends('layout')

@section('title', 'Création d\'un nouvel article')

@section('content')
    <h1>Création d'un nouvel article</h1>
    
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        @if($errors->any())
            <aside class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </aside>
        @endif
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <!--<div class="form-group">-->
        <!--    <label for="picture">Image</label>-->
        <!--    <input type="file" name="picture" id="picture" class="form-control">-->
        <!--</div>-->
        <button class="btn btn-primary">Enregistrer</button>
    </form>
@endsection