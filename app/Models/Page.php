<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use App\Services\MenuService;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'slug', 'description', 'content', 'published_at'],
    ];

    public static $subFields = [
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
                $menuService->updateMenuItems('ABOUT', self::getAll());
            }
        });

        static::deleted(function (self $model) use ($menuService) {
            $menuService->deleteMenuItem($model->title, 'ABOUT');
        });
    }
}
