<?php namespace App\DataTableConfigs;

use Arminsam\Datatable\DataTableConfigInterface;

class CommentConfig implements DataTableConfigInterface {

    public function getColumns()
    {
        return [
            [
                'name' => 'author.name',
                'label' => 'Author',
                'type' => 'text'
            ],
            [
                'name' => 'post.title',
                'label' => 'Post',
                'type' => 'text',
                'link' => 'post_link'
            ],
            [
                'name' => 'content',
                'label' => 'Content',
                'type' => 'text'
            ],
            [
                'name' => 'status',
                'label' => 'Status',
                'type' => 'dropdown',
                'options' => [
                    'pending' => 'Pending',
                    'approved' => 'Approved'
                ]
            ],
            [
                'name' => 'created_at',
                'label' => 'Created',
                'type' => 'date',
                'format' => 'Y/m/d'
            ]
        ];
    }

}