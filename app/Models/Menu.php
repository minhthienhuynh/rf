<?php

namespace App\Models;

class Menu extends \TCG\Voyager\Models\Menu
{
    /**
     * Get the items for the menu.
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
