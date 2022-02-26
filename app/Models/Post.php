<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use TCG\Voyager\Models\Post as Model;

class Post extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'excerpt', 'body', 'published_at'],
    ];

    public static $subFields = [
        'details' => ['slug', 'status', 'featured', 'post_belongstomany_category_relationship', 'post_belongstomany_service_relationship'],
    ];

    /**
     * The categories that belong to the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The services that belong to the post.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
