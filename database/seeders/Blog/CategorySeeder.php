<?php

namespace Database\Seeders\Blog;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use Database\Seeders\AbstractSeeder;
use Illuminate\Support\Arr;

class CategorySeeder extends AbstractSeeder
{
    public function __construct(Category $model, CategoryController $controller)
    {
        parent::__construct($model, $controller, 'voyager-categories');
    }

    protected function buildData()
    {
        if (app()->environment('local')) {
            $data = [
                [
                    'name' => 'Category 1',
                    'slug' => 'category-1',
                ],
                [
                    'name' => 'Category 2',
                    'slug' => 'category-2',
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
        $dataType = $this->_buildDataType([
            'order_column'          => 'order',
            'order_display_column'  => 'name',
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
                    'field'         => 'parent_id',
                ],
                'values'        => [
                    'type'          => 'select_dropdown',
                    'display_name'  => __('voyager::seeders.data_rows.parent'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'default'       => '',
                        'null'          => '',
                        'options'       => [
                            ''              => '-- None --',
                        ],
                        'relationship'  => [
                            'key'           => 'id',
                            'label'         => 'name',
                        ],
                    ],
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
                            'origin'        => 'name',
                        ],
                        'validation'    => [
                            'rule'          => 'unique:categories,slug',
                        ],
                    ],
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'category_belongsto_category_relationship',
                ],
                'values'        => [
                    'type'          => 'relationship',
                    'display_name'  => __('voyager::seeders.data_rows.parent'),
                    'required'      => 0,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'model'         => get_class($this->getModel()),
                        'table'         => $this->getModel()->getTable(),
                        'type'          => 'belongsTo',
                        'column'        => 'parent_id',
                        'key'           => 'id',
                        'label'         => 'name',
                        'pivot_table'   => '',
                        'pivot'         => '0',
                        'taggable'      => null,
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
            'title' => 'Blog',
            'url' => '',
            'icon_class' => 'voyager-news',
            'order' => 7,
        ]);
    }

    protected function buildPermission()
    {
        $this->_buildPermission(['browse', 'read', 'edit', 'add', 'delete']);
    }
}
