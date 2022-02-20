<?php

namespace App\Models;

use TCG\Voyager\Models\MenuItem as Model;

class MenuItem extends Model
{
    /**
     * Get the parent that owns the item.
     */
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
}
