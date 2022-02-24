<?php
namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{

    public function detail($slug)
    {
        $data = Service::where('slug', $slug)->first();
        return view('frontside.service.index', compact('data'));
    }
}
