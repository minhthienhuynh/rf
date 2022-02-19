<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static $mainFields = [
        'main' => ['full_name', 'position', 'description', 'link'],
    ];

    public static $subFields = [
        'media' => ['avatar'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'position',
        'description',
        'link',
        'avatar',
    ];
}
