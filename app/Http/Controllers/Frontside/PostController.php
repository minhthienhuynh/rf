<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $listCateId = [];
        $cates = request()->category_id;
        if($cates) {
            $listCateId = explode(',',  $cates);
        }

        $query = Post::orderByDesc('id')->where('status', 'PUBLISHED');
        $countItem = $query->get()->count();

        if(count($listCateId) > 0) {
            $query = $query->whereIn('category_id', $listCateId);
        }

        $data = $query->paginate(9);
        $recent = Post::take(10)->orderByDesc('id')->get();
        $category = Category::orderByDesc('order')->get();

        return view('frontside.blog.index', compact('data', 'recent', 'category', 'countItem'));
    }

    public function detail($slug)
    {
        $data = Post::where('slug', $slug)->where('status', 'PUBLISHED')->first();
        $recent = Post::take(10)->orderByDesc('id')->get();
        $category = Category::orderByDesc('order')->get();
        $query = Post::orderByDesc('id')->where('status', 'PUBLISHED');
        $countItem = $query->get()->count();
        return view('frontside.blog.detail', compact('data', 'recent', 'category', 'countItem'));
    }
}
