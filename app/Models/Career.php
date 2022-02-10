<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Career extends Model
{
    use Seoable, Translatable;

    public static $mainFields = [
        'main' => ['title', 'description', 'content', 'link'],
    ];

    public static $subFields = [
        'media'    => ['pdf', 'image'],
        'datetime' => ['published_at', 'expired_at'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'link',
        'pdf',
        'image',
        'published_at',
        'expired_at',
    ];
}
