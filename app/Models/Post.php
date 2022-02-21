<?php

namespace App\Models;

use App\Models\Traits\Seoable;
use TCG\Voyager\Models\Post as Model;

class Post extends Model
{
    use Seoable;
}
