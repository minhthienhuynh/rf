<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'description', 'content'],
    ];

    public static $subFields = [
        'details' => ['slug', 'published_at'],
        'media' => ['hero_picture', 'slider'],
        'relationships' => ['service_belongstomany_post_relationship'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'hero_picture',
        'slider',
        'published_at',
    ];
}
