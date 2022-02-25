<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;

class HomeController extends Controller
{

    public function index()
    {
        $dataService = Service::orderBy('order')->get();
        $dataBlog = Post::orderByDesc('id')->where('status', 'PUBLISHED')->limit(4)->get();
        $dataPage = Page::orderBy('order')->get();
        $dataClient = Client::orderBy('order')->get();
        return view('frontside.home.index', compact('dataService', 'dataBlog', 'dataPage', 'dataClient'));
    }
}
