<?php

namespace Database\Seeders\About;

use App\Http\Controllers\MemberController;
use App\Models\Member;
use Database\Seeders\AbstractSeeder;

class MemberSeeder extends AbstractSeeder
{
    public function __construct(Member $model, MemberController $controller)
    {
        parent::__construct($model, $controller, 'voyager-group');
    }

    protected function buildData()
    {
        //
    }

    protected function buildCRUD()
    {
        //Data Type
        $dataType = $this->_buildDataType([
            'order_column'          => 'order',
            'order_display_column'  => 'full_name',
            'order_direction'       => 'asc',
            'default_search_key'    => null,
            'scope'                 => null
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
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'full_name'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.full_name'),
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
                    'field'         => 'position'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.position'),
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
                    'field'         => 'link'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::members.data_rows.link'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'validation'    => [
                            'rule'          => 'url',
                        ],
                    ],
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'avatar'
                ],
                'values'        => [
                    'type'          => 'image',
                    'display_name'  => __('voyager::seeders.data_rows.avatar'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'desc'          => 'Please update an image (4x3), Not larger than 1000px',
                    ],
                ],
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
