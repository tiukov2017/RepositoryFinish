<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\PostRepositoryEloquent;
use App\Repositories\PostRepository;
//use App\Post;
use App\Entities\Post;

class PostsController extends Controller
{
    protected $repository;
    public function __construct (PostRepository $repository)
    {
        $this->middleware('auth')->except(['index','show']);
        $this->repository = $repository;
    }

    public function index ()
    {
        //$posts = Post::all();
        $posts = $this->repository->all();

        return view('posts.index',compact('posts'));
    }

    public function show (Post $post)
    {
//        $post = Post::find($id);

        return view('posts.show',compact('post'));
    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store ()
        {
            $this->validate(request(),[
                'title' => 'required',
                'body'=>'required'
            ]);

            $post = new Post;
            $post->title = request('title');
            $post->body = request('body');
            $post->user_id = auth()->id();
            $post->save();
            return redirect('/');
            //dd(request('title'));
    }
}
