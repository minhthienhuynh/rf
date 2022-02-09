<?php

namespace App\Models;

use TCG\Voyager\Facades\Voyager;

class Permission extends \TCG\Voyager\Models\Permission
{
    public static function generateFor($table_name, $permissions = [])
    {
        if ($permissions) {
            $permissions = array_map(function ($key) use ($table_name) {
                return "{$key}_{$table_name}";
            }, $permissions);

            foreach ($permissions as $key) {
                Voyager::model('Permission')->firstOrCreate(compact('key', 'table_name'));
            }

            Voyager::model('Permission')->where('table_name', $table_name)->whereNotIn('key', $permissions)->delete();
        } else {
            self::firstOrCreate(['key' => 'browse_' . $table_name, 'table_name' => $table_name]);
            self::firstOrCreate(['key' => 'read_' . $table_name, 'table_name' => $table_name]);
            self::firstOrCreate(['key' => 'edit_' . $table_name, 'table_name' => $table_name]);
            self::firstOrCreate(['key' => 'add_' . $table_name, 'table_name' => $table_name]);
            self::firstOrCreate(['key' => 'delete_' . $table_name, 'table_name' => $table_name]);
        }
    }
}
