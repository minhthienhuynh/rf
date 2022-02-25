<?php

namespace Database\Seeders\Homepage;

use App\Http\Controllers\HomepageSettingController;
use App\Models\HomepageSetting;
use App\Models\Setting;
use Database\Seeders\AbstractSeeder;
use Illuminate\Support\Arr;

class HomepageSettingSeeder extends AbstractSeeder
{
    public function __construct(HomepageSetting $model, HomepageSettingController $controller)
    {
        parent::__construct($model, $controller, 'voyager-home');
    }

    protected function buildData()
    {
        $data = [
            [
                'group'    => 'Banner',
                'settings' => [
                    [
                        'key'          => 'banner.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'banner.desc',
                        'display_name' => 'Description',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 2,
                    ],
                    [
                        'key'          => 'banner.image',
                        'display_name' => 'Image',
                        'details'      => null,
                        'type'         => Setting::TYPE_IMAGE,
                        'order'        => 3,
                    ],
                    [
                        'key'          => 'banner.button_title',
                        'display_name' => 'Button title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 4,
                    ],
                    [
                        'key'          => 'banner.button_url',
                        'display_name' => 'Button URL',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 5,
                    ],
                ],
            ],

            [
                'group'    => 'Service',
                'settings' => [
                    [
                        'key'          => 'service.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'service.subtitle',
                        'display_name' => 'Subtitle',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 2,
                    ],
                ],
            ],

            [
                'group'    => 'About',
                'settings' => [
                    [
                        'key'          => 'about.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'about.subtitle',
                        'display_name' => 'Subtitle',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 2,
                    ],
                ],
            ],

            [
                'group'    => 'Blog',
                'settings' => [
                    [
                        'key'          => 'blog.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'blog.subtitle',
                        'display_name' => 'Subtitle',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 2,
                    ],
                ],
            ],

            [
                'group'    => 'Client',
                'settings' => [
                    [
                        'key'          => 'client.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'client.subtitle',
                        'display_name' => 'Subtitle',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT,
                        'order'        => 2,
                    ],
                    [
                        'key'          => 'client.items',
                        'display_name' => 'Client list',
                        'value'        => route('voyager.clients.index'),
                        'details'      => null,
                        'type'         => Setting::TYPE_ITEMS,
                        'order'        => 3,
                    ],
                ],
            ],
        ];

        foreach ($data as $datum) {
            foreach ($datum['settings'] as $setting) {
                $setting['group'] = $datum['group'];
                HomepageSetting::updateOrCreate(Arr::only($setting, 'key'), Arr::except($setting, 'key'));
            }
        }
    }

    protected function buildCRUD()
    {
        //
    }

    protected function buildMenu()
    {
        $this->_buildMenu($this->getPluralName(), 10);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit']);
    }
}
