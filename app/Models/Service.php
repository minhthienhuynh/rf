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
 * @property string  $description
 * @property string  $content
 * @property string  $hero_picture
 * @property string  $slider
 * @property Carbon  $published_at
 */
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
     * The posts that belong to the service.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
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
            if ($model->isDirty(['title', 'slug'])) {
                $menuService->updateHeaderMenuItems('SERVICES', self::getAll());
                $menuService->updateFooterMenuItems('Services', self::getAll());
            }
        });

        static::deleted(function (self $model) use ($menuService) {
            $menuService->deleteMenuItem($model->title, 'SERVICES');
        });
    }

    public function blogs()
    {
        return $this->belongsToMany(Post::class, 'post_service');
    }
}
