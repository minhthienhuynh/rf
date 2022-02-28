<?php

namespace Database\Seeders\Menu;

use App\Models\Page;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class UserFooterMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Voyager::model('Menu')->firstOrCreate(['name' => 'user_footer']);
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
                'title'    => 'Company',
                'url'      => '#',
                'route'    => null,
            ],
            [
                'title'    => 'Services',
                'url'      => '#',
                'route'    => null,
                'children' => Service::getAll(),
            ],
            [
                'title'    => 'Help',
                'url'      => '#',
                'route'    => null,
            ],
        ];

        foreach ($menuItems as $key => $item) {
            $menuItems[$key]['order'] = $key + 1;

            if (isset($item['children'])) {
                $children = [];

                foreach ($item['children'] as $k => $v) {
                    $children[] = [
                        'title'       => $v->title,
                        'description' => $v->menu_description,
                        'url'         => '',
                        'route'       => "{$v->getTable()}.show",
                        'parameters'  => json_encode(['slug' => $v->slug]),
                        'order'       => $k + 1,
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
            $menuItem = $menu->items()->firstOrCreate(Arr::only($item, 'title'), Arr::except($item, ['title', 'children']));

            if (isset($item['children'])) {
                $this->buildMenuItems($menu, $item['children'], $menuItem);
            }
        }
    }
}
