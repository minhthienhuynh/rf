<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $data = Career::orderByDesc('id')->get();
        return view('frontside.careers.index', compact('data'));
    }

    public function detail($slug)
    {
        $data = Career::where('slug', $slug)->first();
        return view('frontside.careers.detail', compact('data'));
    }
}