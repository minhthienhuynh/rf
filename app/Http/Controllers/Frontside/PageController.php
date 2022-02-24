<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{

    public function detail($slug)
    {
        $data = Page::where('slug', $slug)->first();
        return view('frontside.page.index', compact('data'));
    }
}
