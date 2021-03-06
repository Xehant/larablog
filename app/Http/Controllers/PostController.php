<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        // Middleware d'authentification
        // Avant d'appeler la méthode du contrôleur il vérifie qu'il peut le faire
        // Pour appeler les méthodes create et store il faut être authentifié
        // Sinon on est redirigé vers la page de login
        $this->middleware('auth')->only(['create', 'store']);
    }
    
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        
        return view('posts.index', [
            'posts' => $posts    
        ]);
    }
    
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // firstOrFail revient à faire ça : 
        // if ($post === null) {
        //     abort(404);
        // }
        
        return view('posts.show', [
            'post' => $post    
        ]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:5|max:280'
        ]);
        
        // Enregistrer le nouvel article
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = Str::slug($post->title);
        $post->user_id = 1;
        $post->save();
        
        // Redirection vers la page d'accueil
        return redirect()->route('home');
    }
}
