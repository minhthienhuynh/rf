<?php

namespace App\Models;

use TCG\Voyager\Models\Category as Model;

class Category extends Model
{
    /**
     * The posts that belong to the category.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
