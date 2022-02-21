<?php

namespace App\Services;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MenuService
{
    /**
     * @param  string      $itemTitle
     * @param  Collection  $children
     */
    public function updateMenuItems(string $itemTitle, Collection $children)
    {
        /** @var MenuItem $menuItem */
        $menuItem = MenuItem::where('title', $itemTitle)->first();
        $menuItem->children()->delete();

        foreach ($children as $key => $item) {
            $menuItem->children()->create([
                'menu_id'    => $menuItem->menu->id,
                'title'      => $item->title,
                'url'        => '',
                'route'      => "{$item->getTable()}.show",
                'parameters' => json_encode(['slug' => $item->slug]),
                'order'      => $key + 1,
            ]);
        }
    }

    /**
     * @param  string       $title
     * @param  string|null  $parent
     * @return mixed
     */
    public function deleteMenuItem(string $title, string $parent = null)
    {
        $item = MenuItem::where('title', $title)
            ->when(!blank($parent), function (Builder $query) use ($parent) {
                $query->whereHas('parent', function (Builder $query) use ($parent) {
                    $query->where('title', $parent);
                });
            })
            ->first();

        return $item->delete();
    }
}
