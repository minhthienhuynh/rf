<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        
        $data = Post::orderByDesc('id')->where('status', 'PUBLISHED')->paginate(9);
        $recent = Post::take(10)->orderByDesc('id')->get();
        $category = Category::orderByDesc('order')->get();

        return view('frontside.blog.index', compact('data', 'recent', 'category'));
    }

    public function detail($slug)
    {
        $data = Post::where('slug', $slug)->first();
        return view('frontside.blog.detail', compact('data'));
    }
}
