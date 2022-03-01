<?php

namespace Database\Seeders;

use Database\Seeders\About\MemberSeeder;
use Database\Seeders\About\PageSeeder;
use Database\Seeders\Blog\CategorySeeder;
use Database\Seeders\Blog\PostSeeder;
use Database\Seeders\Blog\TagSeeder;
use Database\Seeders\Homepage\ClientSeeder;
use Database\Seeders\Homepage\HomepageSettingSeeder;
use Database\Seeders\Menu\UserFooterMenuSeeder;
use Database\Seeders\Menu\UserHeaderMenuSeeder;
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
            UsersTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
        $this->call(ServiceSeeder::class);
        $this->call([PageSeeder::class, MemberSeeder::class,]);
        $this->call([CategorySeeder::class, PostSeeder::class, TagSeeder::class]);
        $this->call(CareerSeeder::class);
        $this->call([HomepageSettingSeeder::class, ClientSeeder::class]);
        $this->call([UserHeaderMenuSeeder::class, UserFooterMenuSeeder::class]);
    }
}
