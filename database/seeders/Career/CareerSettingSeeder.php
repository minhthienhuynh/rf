<?php

namespace Database\Seeders\Career;

use App\Http\Controllers\Admin\CareerSettingController;
use App\Models\CareerSetting;
use App\Models\Setting;
use Database\Seeders\AbstractSeeder;
use Illuminate\Support\Arr;

class CareerSettingSeeder extends AbstractSeeder
{
    public function __construct(CareerSetting $model, CareerSettingController $controller)
    {
        parent::__construct($model, $controller, 'voyager-documentation');
    }

    protected function buildData()
    {
        $data = [
            [
                'group'    => 'Index',
                'settings' => [
                    [
                        'key'          => 'index.banner',
                        'display_name' => 'Banner',
                        'details'      => null,
                        'type'         => Setting::TYPE_IMAGE,
                        'order'        => 1,
                    ],
                    [
                        'key'          => 'index.title',
                        'display_name' => 'Title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 2,
                    ],
                    [
                        'key'          => 'index.summary_title',
                        'display_name' => 'Summary title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 3,
                    ],
                    [
                        'key'          => 'index.summary_desc',
                        'display_name' => 'Summary description',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 4,
                    ],
                    [
                        'key'          => 'index.policy_title',
                        'display_name' => 'Policy title',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 5,
                    ],
                    [
                        'key'          => 'index.policy_desc',
                        'display_name' => 'Policy description',
                        'details'      => null,
                        'type'         => Setting::TYPE_TEXT_AREA,
                        'order'        => 6,
                    ],
                ],
            ],
        ];

        foreach ($data as $datum) {
            foreach ($datum['settings'] as $setting) {
                $setting['group'] = $datum['group'];
                CareerSetting::updateOrCreate(Arr::only($setting, 'key'), Arr::except($setting, 'key'));
            }
        }
    }

    protected function buildCRUD()
    {
        //
    }

    protected function buildMenu()
    {
        $this->_buildMenu($this->getPluralName(), 4);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'delete']);
    }
}
