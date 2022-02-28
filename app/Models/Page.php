<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use App\Services\MenuService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property integer $id
 * @property string  $title
 * @property string  $slug
 * @property string  $menu_description
 * @property string  $description
 * @property string  $content
 * @property string  $hero_picture
 * @property boolean $show_in_about
 * @property Carbon  $published_at
 */
class Page extends Model
{
    use Seoable;

    public static $mainFields = [
        'main' => ['title', 'menu_description', 'description', 'content'],
    ];

    public static $subFields = [
        'details' => ['slug', 'hero_picture', 'published_at', 'show_in_about'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'menu_description',
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
        return self::where('show_in_about', true)->orderBy('order')->get();
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
            if ($model->isDirty(['title', 'slug', 'menu_description', 'show_in_about'])) {
                $menuService->updateHeaderMenuItems('ABOUT', self::getAll());
            }
        });

        static::deleted(function (self $model) use ($menuService) {
            $menuService->deleteMenuItem($model->title, 'ABOUT');
        });
    }
}
