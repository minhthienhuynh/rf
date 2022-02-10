<?php

namespace App\Listeners;

use App\Services\SeoService;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;

class SaveSeo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BreadDataAdded|BreadDataUpdated  $event
     * @return void
     */
    public function handle(BreadDataAdded|BreadDataUpdated $event)
    {
        $seoService = new SeoService();

        $seoService->save(request(), $event->data);
    }
}
