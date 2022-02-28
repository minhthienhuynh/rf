<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class MenuService
{
    /**
     * @param  string      $itemTitle
     * @param  Collection  $children
     */
    public function updateHeaderMenuItems(string $itemTitle, Collection $children)
    {
        $menu = Voyager::model('Menu')->where('name', 'user')->first();
        $menuItem = $menu->items()->where('title', $itemTitle)->first();

        if ($menuItem) {
            $this->reSyncUserMenu($menuItem, $children);
        }
    }
    /**
     * @param  string      $itemTitle
     * @param  Collection  $children
     */
    public function updateFooterMenuItems(string $itemTitle, Collection $children)
    {
        $menu = Voyager::model('Menu')->where('name', 'user_footer')->first();
        $menuItem = $menu->items()->where('title', $itemTitle)->first();

        if ($menuItem) {
            $this->reSyncUserMenu($menuItem, $children);
        }
    }

    private function reSyncUserMenu(MenuItem $menuItem, Collection $children) {
        $menuItem->children()->delete();

        foreach ($children as $key => $item) {
            $menuItem->children()->create([
                'menu_id'     => $menuItem->menu->id,
                'title'       => $item->title,
                'description' => $item->description,
                'url'         => '',
                'route'       => "{$item->getTable()}.show",
                'parameters'  => json_encode(['slug' => $item->slug]),
                'order'       => $key + 1,
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
        $menu = Voyager::model('Menu')->where('name', 'user')->first();

        $item = MenuItem::where('title', $title)
            ->where('menu_id', $menu->id)
            ->when(!blank($parent), function (Builder $query) use ($parent) {
                $query->whereHas('parent', function (Builder $query) use ($parent) {
                    $query->where('title', $parent);
                });
            })
            ->first();

        return $item->delete();
    }
}
