<?php namespace App\DataTableConfigs;

use Arminsam\Datatable\DataTableConfigInterface;

class TagConfig implements DataTableConfigInterface {

    public function getColumns()
    {
        return [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'link' => 'tag_link'
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