<?php namespace App\DataTableConfigs;

use Arminsam\Datatable\DataTableConfigInterface;

class CategoryConfig implements DataTableConfigInterface {

    public function getColumns()
    {
        return [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'link' => 'category_link'
            ],
            [
                'name' => 'parent.name',
                'label' => 'Parent',
                'type' => 'text',
                'link' => 'category_parent_link'
            ],
            [
                'name' => 'entities',
                'label' => 'Entities',
                'type' => 'text',
                'link' => 'entities_link',
                'sortable' => false
            ],
        ];
    }

}