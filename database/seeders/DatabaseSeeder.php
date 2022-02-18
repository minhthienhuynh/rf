<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
        $this->call(CareerSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
