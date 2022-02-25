<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'link',
        'order',
    ];

    /**
     * @return mixed
     */
    public static function getAll()
    {
        return self::orderBy('order')->get();
    }
}
