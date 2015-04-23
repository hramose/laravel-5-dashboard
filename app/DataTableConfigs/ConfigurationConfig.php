<?php namespace App\DataTableConfigs;

use Arminsam\Datatable\DataTableConfigInterface;

class ConfigurationConfig implements DataTableConfigInterface {

    public function getColumns()
    {
        return [
            [
                'name' => 'label',
                'label' => 'Option Label',
                'type' => 'text'
            ],
            [
                'name' => 'key',
                'label' => 'Option Key',
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'label' => 'Option Type',
                'type' => 'dropdown',
                'options' => [
                    'textbox' => 'Text', 'textarea' => 'Paragraph', 'wysiwyg' => 'WYSIWYG',
                    'date' => 'Date', 'time' => 'Time', 'datetime' => 'Date/Time',
                    'number' => 'Number', 'checkbox' => 'Checkbox', 'radio' => 'Radio',
                    'select' => 'Dropdown Menu', 'multiple' => 'Multiple Select', 'file' => 'File'
                ]
            ],
            [
                'name' => 'options',
                'label' => 'Multiple Select Options',
                'type' => 'text',
            ]
        ];
    }

}