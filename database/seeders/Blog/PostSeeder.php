<?php

namespace Database\Seeders\Blog;

use App\Http\Controllers\Admin\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use App\Models\Tag;
use Database\Seeders\AbstractSeeder;
use Illuminate\Support\Arr;

class PostSeeder extends AbstractSeeder
{
    public function __construct(Post $model, PostController $controller)
    {
        parent::__construct($model, $controller, 'voyager-news');
    }

    protected function buildData()
    {
        if (app()->environment('local')) {
            $data = [
                [
                    'title'    => 'Lorem Ipsum Post',
                    'slug'     => 'lorem-ipsum-post',
                    'excerpt'  => 'This is the excerpt for the Lorem Ipsum Post',
                    'body'     => '<p>This is the body of the lorem ipsum post</p>',
                    'image'    => 'posts/post1.jpg',
                    'status'   => $this->getModel()::PUBLISHED,
                    'featured' => false,
                ],
                [
                    'title'    => 'My Sample Post',
                    'slug'     => 'my-sample-post',
                    'excerpt'  => 'This is the excerpt for the sample Post',
                    'body'     => '<p>This is the body for the sample post, which includes the body.</p>' .
                        '<h2>We can use all kinds of format!</h2>' .
                        '<p>And include a bunch of other stuff.</p>',
                    'image'    => 'posts/post2.jpg',
                    'status'   => $this->getModel()::PUBLISHED,
                    'featured' => false,
                ],
                [
                    'title'    => 'Latest Post',
                    'slug'     => 'latest-post',
                    'excerpt'  => 'This is the excerpt for the latest post',
                    'body'     => '<p>This is the body for the latest post</p>',
                    'image'    => 'posts/post3.jpg',
                    'status'   => $this->getModel()::PUBLISHED,
                    'featured' => false,
                ],
                [
                    'title'    => 'Yarr Post',
                    'slug'     => 'yarr-post',
                    'excerpt'  => 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.',
                    'body'     => '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>' .
                        '<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>' .
                        '<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>',
                    'image'    => 'posts/post4.jpg',
                    'status'   => $this->getModel()::PUBLISHED,
                    'featured' => false,
                ],
            ];

            foreach ($data as $datum) {
                $this->getModel()::updateOrCreate(Arr::only($datum, 'slug'), Arr::except($datum, 'slug'))
                    ->categories()->sync([1, 2]);
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
                    'field'         => 'author_id',
                ],
                'values'        => [
                    'type'          => 'number',
                    'display_name'  => __('voyager::seeders.data_rows.author'),
                    'required'      => 1,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 0,
                    'add'           => 0,
                    'delete'        => 0,
                    'order'         => 12,
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
                    'field'         => 'excerpt'
                ],
                'values'        => [
                    'type'          => 'text_area',
                    'display_name'  => __('voyager::seeders.data_rows.excerpt'),
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
                    'field'         => 'body'
                ],
                'values'        => [
                    'type'          => 'rich_text_box',
                    'display_name'  => __('voyager::seeders.data_rows.body'),
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
                    'order'         => 6,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'status'
                ],
                'values'        => [
                    'type'          => 'select_dropdown',
                    'display_name'  => __('voyager::seeders.data_rows.status'),
                    'required'      => 1,
                    'browse'        => 1,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 6,
                    'details'      => [
                        'default' => 'DRAFT',
                        'options' => [
                            'PUBLISHED' => 'published',
                            'DRAFT'     => 'draft',
                            'PENDING'   => 'pending',
                        ],
                    ],
                    'order'         => 7,
                ],
            ],
            [
                'attributes'    => [
                    'field'         => 'featured',
                ],
                'values'        => [
                    'type'          => 'checkbox',
                    'display_name'  => __('voyager::seeders.data_rows.featured'),
                    'required'      => 1,
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
                    'field'         => 'post_belongstomany_category_relationship',
                ],
                'values'        => [
                    'type'          => 'relationship',
                    'display_name'  => __('voyager::seeders.data_rows.categories'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'model'         => Category::class,
                        'table'         => app(Category::class)->getTable(),
                        'type'          => 'belongsToMany',
                        'column'        => 'id',
                        'key'           => 'id',
                        'label'         => 'name',
                        'pivot_table'   => 'category_post',
                        'pivot'         => '1',
                        'taggable'      => '0',
                    ],
                    'order'         => 9,
                ]
            ],
            [
                'attributes'    => [
                    'field'         => 'post_belongstomany_service_relationship',
                ],
                'values'        => [
                    'type'          => 'relationship',
                    'display_name'  => __('voyager::seeders.data_rows.services'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'model'         => Service::class,
                        'table'         => app(Service::class)->getTable(),
                        'type'          => 'belongsToMany',
                        'column'        => 'id',
                        'key'           => 'id',
                        'label'         => 'title',
                        'pivot_table'   => 'post_service',
                        'pivot'         => '1',
                        'taggable'      => '0',
                    ],
                    'order'         => 10,
                ]
            ],
            [
                'attributes'    => [
                    'field'         => 'post_belongstomany_tag_relationship',
                ],
                'values'        => [
                    'type'          => 'relationship',
                    'display_name'  => __('voyager::seeders.data_rows.tags'),
                    'required'      => 0,
                    'browse'        => 0,
                    'read'          => 1,
                    'edit'          => 1,
                    'add'           => 1,
                    'delete'        => 1,
                    'details'       => [
                        'model'         => Tag::class,
                        'table'         => app(Tag::class)->getTable(),
                        'type'          => 'belongsToMany',
                        'column'        => 'id',
                        'key'           => 'id',
                        'label'         => 'name',
                        'pivot_table'   => 'post_tag',
                        'pivot'         => '1',
                        'taggable'      => 'on',
                    ],
                    'order'         => 11,
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
                    'order'         => 13,
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
                    'order'         => 14,
                ]
            ],
        ];

        $this->_buildDataRows($dataType, $dataRows);
    }

    protected function buildMenu()
    {
        $this->_buildMenu($this->getPluralName(), 2, [
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
