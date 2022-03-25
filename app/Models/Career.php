<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Career extends Model
{
    use Seoable, Translatable;

    public static $mainFields = [
        'main' => ['active', 'title', 'slug', 'description', 'content', 'link', 'published_at', 'expired_at'],
    ];

    public static $subFields = [
        'media' => ['pdf', 'image'],
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
        'link',
        'pdf',
        'image',
        'active',
        'published_at',
        'expired_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        'published_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
