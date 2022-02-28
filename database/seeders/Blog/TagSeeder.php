<?php

namespace Database\Seeders\Blog;

use App\Http\Controllers\Admin\TagController;
use App\Models\Tag;
use Database\Seeders\AbstractSeeder;

class TagSeeder extends AbstractSeeder
{
    public function __construct(Tag $model, TagController $controller)
    {
        parent::__construct($model, $controller, 'voyager-tag');
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
                    'field'         => 'name'
                ],
                'values'        => [
                    'type'          => 'text',
                    'display_name'  => __('voyager::seeders.data_rows.name'),
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
                    'order'         => 3,
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
                    'order'         => 4,
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
