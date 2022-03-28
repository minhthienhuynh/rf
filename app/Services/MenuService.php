<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MenuService
{
    /**
     * @param  string      $itemTitle
     * @param  Collection  $children
     */
    public function updateHeaderMenuItems(string $itemTitle, Collection $children)
    {
        $menu = Menu::where('name', 'user')->first();
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
        $menu = Menu::where('name', 'user_footer')->first();
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
                'description' => $item->menu_description,
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
        $menu = Menu::where('name', 'user')->first();

        $menuItem = $menu->items()
            ->where('title', $title)
            ->when(!blank($parent), function (Builder $query) use ($parent) {
                $query->whereHas('parent', function (Builder $query) use ($parent) {
                    $query->where('title', $parent);
                });
            })
            ->first();

        return $menuItem->delete();
    }
}
