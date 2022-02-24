<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Voyager::model('Menu')->firstOrCreate(['name' => 'user']);
        $menu->items()->delete();
        $menuItems = $this->getMenuItems();
        $this->buildMenuItems($menu, $menuItems);
    }

    /**
     * @return array
     */
    private function getMenuItems(): array
    {
        $menuItems = [
            [
                'title' => 'HOME',
                'url'   => '',
                'route' => 'home',
            ],
            [
                'title'    => 'SERVICES',
                'url'      => '#',
                'route'    => null,
                'children' => Service::getAll(),
            ],
            [
                'title'    => 'ABOUT',
                'url'      => '#',
                'route'    => null,
                'children' => Page::getAll(),
            ],
            [
                'title' => 'BLOG',
                'url'   => '',
                'route' => 'blogs.index',
            ],
            [
                'title' => 'CAREERS',
                'url'   => '',
                'route' => 'careers.index',
            ],
            [
                'title' => 'CONTACT',
                'url'   => '#contact-section',
                'route' => null,
            ],
        ];

        foreach ($menuItems as $key => $item) {
            $menuItems[$key]['order'] = $key + 1;

            if (isset($item['children'])) {
                $children = [];

                foreach ($item['children'] as $k => $v) {
                    $children[] = [
                        'title'      => $v->title,
                        'url'        => '',
                        'route'      => "{$v->getTable()}.show",
                        'parameters' => json_encode(['slug' => $v->slug]),
                        'order'      => $k + 1,
                    ];
                }

                $menuItems[$key]['children'] = $children;
            }
        }

        return $menuItems;
    }

    /**
     * @param  Menu           $menu
     * @param  array          $menuItems
     * @param  MenuItem|null  $parentMenu
     */
    private function buildMenuItems(Menu $menu, array $menuItems, MenuItem $parentMenu = null)
    {
        foreach ($menuItems as $item) {
            if ($parentMenu) {
                $item['parent_id'] = $parentMenu->id;
                $item['url'] = '';
            }

            /** @var MenuItem $menuItem */
            $menuItem = $menu->items()->create(Arr::except($item, 'children'));

            if (isset($item['children'])) {
                $this->buildMenuItems($menu, $item['children'], $menuItem);
            }
        }
    }
}
