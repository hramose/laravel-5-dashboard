<?php namespace App\DataTableConfigs;

use Arminsam\Datatable\DataTableConfigInterface;

class PostConfig implements DataTableConfigInterface {

    public function getColumns()
    {
        return [
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
                'link' => 'post_link'
            ],
            [
                'name' => 'content',
                'label' => 'Content',
                'type' => 'text'
            ],
            [
                'name' => 'author.name',
                'label' => 'Author',
                'type' => 'text'
            ],
            [
                'name' => 'status',
                'label' => 'Status',
                'type' => 'dropdown',
                'options' => [
                    'draft' => 'Draft',
                    'published' => 'Published'
                ]
            ],
            [
                'name' => 'comments',
                'label' => 'Comments',
                'type' => 'text',
                'link' => 'comments_link',
                'sortable' => false
            ],
            [
                'name' => 'created_at',
                'label' => 'Published',
                'type' => 'date',
                'format' => 'Y/m/d'
            ]
        ];
    }

}