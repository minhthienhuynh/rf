<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use App\Services\MenuService;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'slug', 'description', 'content', 'published_at'],
    ];

    public static $subFields = [
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

    /**
     * @return mixed
     */
    public static function getAll()
    {
        return self::orderBy('order')->get();
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        $menuService = new MenuService();

        static::saved(function (self $model) use ($menuService) {
            if ($model->isDirty(['title', 'slug', 'published_at'])) {
                $menuService->updateMenuItems('SERVICES', self::getAll());
            }
        });

        static::deleted(function (self $model) use ($menuService) {
            $menuService->deleteMenuItem($model->title, 'SERVICES');
        });
    }
}
