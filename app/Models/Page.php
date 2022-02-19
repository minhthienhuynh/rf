<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'description', 'content'],
    ];

    public static $subFields = [
        'details' => ['slug', 'published_at'],
        'media' => ['hero_picture'],
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
        'published_at',
    ];
}
