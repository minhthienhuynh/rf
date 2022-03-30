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

if (!function_exists('str_compact')) {
    function str_compact(string $search, string $string, int $number = 20): string
    {
        $arr = explode(' ', $string);

        if (count($arr) > $number) {
            $pos = array_key_first(preg_grep("/{$search}/i", $arr));
            $words = [];

            if ($pos > ($number / 2)) {
                $words[] = '...';
            }

            for ($i = $pos - ($number / 2); $i < $pos + ($number / 2); $i++) {
                if (isset($arr[$i])) {
                    $words[] = $arr[$i];
                }
            }

            if (array_key_last($words) >= $number) {
                $words[] = '...';
            }

            $string = implode($words, ' ');
        }

        return $string;
    }
}
