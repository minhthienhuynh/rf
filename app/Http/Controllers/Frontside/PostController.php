<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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
            $query = $query->whereHas('categories', function($q) use ($listCateId) {
                    $q->whereIn('id', $listCateId);
            });
        }

        $result = $query->get()->count();
        
        $data = $query->paginate(9);
        $recent = Post::take(10)->orderByDesc('id')->get();
        $category = Category::orderByDesc('order')->get();

        return view('frontside.blog.index', compact('data', 'recent', 'category', 'countItem', 'result'));
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

    public function search(Request $request)
    {
        if ($request->isNotFilled('q')) {
            return redirect()->back();
        }

        $posts = Post::where('status', Post::PUBLISHED)
            ->where('title', 'like', "%{$request->input('q')}%")
            ->orWhere('excerpt', 'like', "%{$request->input('q')}%")
            ->orWhere('body', 'like', "%{$request->input('q')}%")
            ->orWhereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->input('q'));
            })
            ->paginate(12);

        return view('frontside.blog.search', compact('posts'));
    }
}
