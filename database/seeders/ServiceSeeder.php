<?php

namespace Database\Seeders;

use App\Http\Controllers\ServiceController;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Arr;

class ServiceSeeder extends AbstractSeeder
{
    public function __construct(Service $model, ServiceController $controller)
    {
        parent::__construct($model, $controller, 'voyager-ship');
    }

    protected function buildData()
    {
        if (app()->environment('local')) {
            $data = [
                [
                    'title' => 'Stewardship',
                    'slug' => 's1',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '',
                    'hero_picture' => url('/html/assets/img/images/services/img-01.jpg'),
                    'published_at' => now(),
                ],
                [
                    'title' => 'Planning & Adaptive Management',
                    'slug' => 's2',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '',
                    'hero_picture' => url('/html/assets/img/images/services/img-02.jpg'),
                    'published_at' => now(),
                ],
                [
                    'title' => 'Science',
                    'slug' => 's3',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '',
                    'hero_picture' => url('/html/assets/img/images/services/img-03.jpg'),
                    'published_at' => now(),
                ],
                [
                    'title' => 'Timber',
                    'slug' => 's4',
                    'description' => 'Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren.',
                    'content' => '',
                    'hero_picture' => url('/html/assets/img/images/services/img-04.jpg'),
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
                            'forceUpdate'   => true,
                        ],
                        'validation'    => [
                            'rule'          => 'unique:services,slug',
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
                    'field'         => 'slider'
                ],
                'values'        => [
                    'type'          => 'multiple_images',
                    'display_name'  => __('voyager::seeders.data_rows.slider'),
                    'required'      => 1,
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
                    'field'         => 'service_belongstomany_post_relationship',
                ],
                'values'        => [
                    'type'          => 'relationship',
                    'display_name'  => __('voyager::seeders.data_rows.posts'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'model'         => Post::class,
                        'table'         => app(Post::class)->getTable(),
                        'type'          => 'belongsToMany',
                        'column'        => 'id',
                        'key'           => 'id',
                        'label'         => 'title',
                        'pivot_table'   => 'post_service',
                        'pivot'         => '1',
                        'taggable'      => '0',
                    ],
                    'order'         => 9,
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
                    'order'         => 10,
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
                    'order'         => 11,
                ]
            ],
        ];

        $this->_buildDataRows($dataType, $dataRows);
    }

    protected function buildMenu()
    {
        $this->_buildMenu($this->getPluralName(), 4);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'add', 'delete']);
    }
}
