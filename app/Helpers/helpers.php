<?php

use App\Models\HomepageSetting;

if (!function_exists('homepage_setting')) {
    function homepage_setting(string $key, string $default = null): ?string
    {
        return @HomepageSetting::where('key', $key)->first()->value ?? $default;
    }
}
