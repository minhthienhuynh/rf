<?php

namespace App\Models\Traits;

use App\Models\Seo;

trait Seoable
{
    /**
     * Get the model's seo.
     */
    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
