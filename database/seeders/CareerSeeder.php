<?php

namespace Database\Seeders;

use App\Http\Controllers\CareerController;
use App\Models\Career;

class CareerSeeder extends AbstractSeeder
{
    public function __construct(Career $model, CareerController $controller)
    {
        parent::__construct($model, $controller, 'voyager-documentation');
    }

    protected function buildData()
    {
        // TODO: Implement buildData() method.
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
                            'rule'          => 'unique:careers,slug',
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
                    'field'         => 'link'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.link'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'order'         => 6,
                    'details'       => [
                        'validation'    => [
                            'rule'          => 'url',
                        ],
                    ],
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'pdf'
                ],
                'values'        => [
                    'type'          => 'file',
                    'display_name'  => __('voyager::seeders.data_rows.pdf'),
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
                    'field'         => 'image'
                ],
                'values'        => [
                    'type'          => 'image',
                    'display_name'  => __('voyager::seeders.data_rows.image'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'order'         => 8,
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
                    'order'         => 9,
                ]
            ],
            [
                'attributes'    => [
                    'field'         => 'expired_at',
                ],
                'values'        => [
                    'type'          => 'timestamp',
                    'display_name'  => __('voyager::seeders.data_rows.expired_at'),
                    'required'      => 0,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'order'         => 10,
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
                    'order'         => 11,
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
                    'order'         => 12,
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
