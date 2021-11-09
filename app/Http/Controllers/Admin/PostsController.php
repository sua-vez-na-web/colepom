<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\Syndicate;

class PostsController extends Controller
{
    private $syndicateRepository;

    public function __construct(Syndicate $syndicate)
    {
        $this->syndicateRepository = $syndicate;
       
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return view('admin.pages.posts.index', compact('posts'));
    }

    
    public function create()
    {
        $syndicates = $this->syndicateRepository->pluck('name', 'id');
        return view('admin.pages.posts.create', compact('syndicates'));
    }

 
    public function store(Request $request)
    {

      
        Post::create($request->all());

        return redirect()->route('posts.index')->with('msg', 'Notícia Adicionada!');
    }

 
    public function show($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.posts.show', compact('post'));
    }

  
    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        };
        $syndicates = Syndicate::pluck('name', 'id');
        return view('admin.pages.posts.edit', compact('post', 'syndicates'));
    }

   
    public function update(Request $request, $id)
    {
        if (!$post = Testimonial::find($id)) {
            return redirect()->back();
        };

        $post->title = $request->title;
        $post->body = $request->mybody;
        $post->syndicate_id = $request->syndicates_id;
        $post->link = $request->link;
        $post->is_active = $request->is_active;
 

        $post->save();

        return redirect()->route('posts.index');
    }

  
    public function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        };

        $post->delete();

        return redirect()->route('posts.index');
    }
}
