<?php

namespace Database\Seeders\Homepage;

use App\Http\Controllers\Admin\ClientController;
use App\Models\Client;
use Database\Seeders\AbstractSeeder;

class ClientSeeder extends AbstractSeeder
{
    public function __construct(Client $model, ClientController $controller)
    {
        parent::__construct($model, $controller, 'voyager-company');
    }

    protected function buildData()
    {
        //
    }

    protected function buildCRUD()
    {
        //Data Type
        $dataType = $this->_buildDataType([
            'order_column'         => 'order',
            'order_display_column' => 'logo',
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
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'logo'
                ],
                'values'        => [
                    'type'          => 'image',
                    'display_name'  => __('voyager::seeders.data_rows.logo'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 0,
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
                    'browse'        => 1,
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
        //
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'add', 'delete']);
    }
}
