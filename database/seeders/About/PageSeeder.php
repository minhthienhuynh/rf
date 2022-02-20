<?php

namespace Database\Seeders\About;

use App\Http\Controllers\PageController;
use App\Models\Page;
use Database\Seeders\AbstractSeeder;
use Illuminate\Support\Arr;

class PageSeeder extends AbstractSeeder
{
    public function __construct(Page $model, PageController $controller)
    {
        parent::__construct($model, $controller, 'voyager-trees');
    }

    protected function buildData()
    {
        if (app()->environment('local')) {
            $data = [
                [
                    'title' => 'Our Mission / Vision',
                    'slug' => 'vision',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '<p>content</p>',
                    'hero_picture' => url('/html/assets/img/images/visual-img-03.jpg'),
                    'published_at' => now(),
                ],
                [
                    'title' => 'Diversity',
                    'slug' => 'diversity',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '<p>content</p>',
                    'hero_picture' => url('/html/assets/img/images/visual-img-03.jpg'),
                    'published_at' => now(),
                ],
                [
                    'title' => 'Our Members',
                    'slug' => 'members',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '<p>content</p>',
                    'hero_picture' => url('/html/assets/img/images/visual-img-03.jpg'),
                    'published_at' => now(),
                ],
            ];

            foreach ($data as $datum) {
                $this->getModel()::updateOrCreate(Arr::only($datum, 'slug'), Arr::except($datum, 'slug'));
            }
        }
    }

    protected function buildCRUD()
    {
        //Data Type
        $dataType = $this->_buildDataType();

        $dataRows = [
            [
                'attributes'    => [
                    'field'         => 'id',
                ],
                'values'        => [
                    'type'          => 'number',
                    'display_name'  => __('voyager::seeders.data_rows.id'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 0,
                    'edit'          => 0,
                    'add'           => 0,
                    'delete'        => 0,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'title'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.title'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'display'       => [
                            'width'         => 6,
                        ],
                    ],
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'slug'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.slug'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'display'       => [
                            'width'         => 6,
                        ],
                        'slugify'       => [
                            'origin'        => 'title',
                            'forceUpdate'   => true,
                        ],
                        'validation'    => [
                            'rule'          => 'unique:pages,slug',
                        ],
                    ],
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'description'
                ],
                'values'        => [
                    'type'          => 'text_area',
                    'display_name'  => __('voyager::seeders.data_rows.description'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'content'
                ],
                'values'        => [
                    'type'          => 'rich_text_box',
                    'display_name'  => __('voyager::seeders.data_rows.content'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'hero_picture'
                ],
                'values'        => [
                    'type'          => 'image',
                    'display_name'  => __('voyager::seeders.data_rows.hero_picture'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'published_at',
                ],
                'values'        => [
                    'type'          => 'timestamp',
                    'display_name'  => __('voyager::seeders.data_rows.published_at'),
                    'required'      => 0,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                ]
            ],
            [
                'attributes'    => [
                    'field'         => 'created_at',
                ],
                'values'        => [
                    'type'          => 'timestamp',
                    'display_name'  => __('voyager::seeders.data_rows.created_at'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 0,
                    'add'           => 0,
                    'delete'        => 0,
                ]
            ],
            [
                'attributes'    => [
                    'field'         => 'updated_at',
                ],
                'values'        => [
                    'type'          => 'timestamp',
                    'display_name'  => __('voyager::seeders.data_rows.updated_at'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 0,
                    'add'           => 0,
                    'delete'        => 0,
                ]
            ],
        ];

        $this->_buildDataRows($dataType, $dataRows);
    }

    protected function buildMenu()
    {
        $this->_buildMenu($this->getPluralName(), 1, [
            'title' => 'About',
            'url' => '',
            'icon_class' => 'voyager-info-circled',
            'order' => 4,
        ]);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'add', 'delete']);
    }
}
