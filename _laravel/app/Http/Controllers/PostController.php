<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    // public function applications()
    // {
    //     $posts = Post::all();
    //     return view('apps', ['posts' => $posts]);
    // }

    public function applications()
    {
        $posts = Post::all();
        return view('apps', ['posts' => $posts]);
    }

    



    public function store(Request $request)
    {
        $post = new Post;
        $post->month = $request->month;
        $post->occupation = $request->occupation;
        $post->age = $request->age;
        $post->num_of_loan = $request->num_of_loan;
        $post->description = $request->description;
        $post->save();
        return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}