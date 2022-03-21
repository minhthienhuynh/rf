<?php

use App\Models\HomepageSetting;
use App\Models\CareerSetting;

if (!function_exists('homepage_setting')) {
    function homepage_setting(string $key, string $default = null): ?string
    {
        return @HomepageSetting::where('key', $key)->first()->value ?? $default;
    }
}

if (!function_exists('career_setting')) {
    function career_setting(string $key, string $default = null): ?string
    {
        return @CareerSetting::where('key', $key)->first()->value ?? $default;
    }
}
