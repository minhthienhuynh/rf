<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use TCG\Voyager\Models\Post as Model;

class Post extends Model
{
    use Seoable;

    /**
     * The services that belong to the post.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
