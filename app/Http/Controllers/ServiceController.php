<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Arr;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ServiceController extends VoyagerBaseController
{
    /**
     * @param  Service  $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function orderSlider(Service $service)
    {
        if (request()->isMethod('get')) {
            return view('voyager::services.order-slider')
                ->with(compact('service'));
        } else {
            $slider = Arr::flatten(json_decode(request()->get('order'), true));

            $service->update(['slider' => json_encode($slider)]);
        }
    }
}
