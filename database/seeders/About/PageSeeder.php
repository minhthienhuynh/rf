<?php

namespace Database\Seeders\About;

use App\Http\Controllers\Admin\PageController;
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
        $data = [];

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
            ];
        }

        $data[] = [
                'title' => 'Our Members',
                'slug' => 'members',
                'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                'content' => '<p>content</p>',
                'hero_picture' => url('/html/assets/img/images/visual-img-03.jpg'),
                'published_at' => now(),
            ];

        foreach ($data as $datum) {
            $model = Page::where('slug', $datum['slug'])->first();

            if (!$model) {
                $model = new Page();
            }

            $model->title = $datum['title'];
            $model->slug = $datum['slug'];
            $model->description = $datum['description'];
            $model->content = $datum['content'];
            $model->hero_picture = $datum['hero_picture'];
            $model->show_in_about = true;

            $model->saveQuietly();
        }
    }

    protected function buildCRUD()
    {
        //Data Type
        $dataType = $this->_buildDataType([
            'order_column'         => 'order',
            'order_display_column' => 'title',
            'order_direction'      => 'asc',
            'default_search_key'   => null,
            'scope'                => null
        ]);

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
                    'order'         => 1,
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
                    'details'       => [],
                    'order'         => 2,
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
                        'slugify'       => [
                            'origin'        => 'title',
                        ],
                        'validation'    => [
                            'rule'          => 'unique:pages,slug',
                        ],
                    ],
                    'order'         => 3,
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
                    'order'         => 4,
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
                    'details'       => [
                        'validation'    => [
                            'rule'          => 'required',
                        ],
                    ],
                    'order'         => 5,
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
                    'order'         => 6,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'show_in_about'
                ],
                'values'        => [
                    'type'          => 'checkbox',
                    'display_name'  => __('voyager::pages.data_rows.show_in_about'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'order'         => 7,
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
                    'order'         => 8,
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
                    'order'         => 9,
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
                    'order'         => 10,
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
            'order' => 6,
        ]);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'add', 'delete']);
    }
}
