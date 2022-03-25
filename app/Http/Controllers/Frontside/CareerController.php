<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $data = Career::active()->orderByDesc('id')->get();

        return view('frontside.careers.index', compact('data'));
    }

    public function detail($slug)
    {
        $data = Career::active()->where('slug', $slug)->first();

        abort_if(!$data, 404);

        return view('frontside.careers.detail', compact('data'));
    }
}
