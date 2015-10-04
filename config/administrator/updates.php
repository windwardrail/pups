<?php

return array(
    'title'   => 'Pet Updates',

    'single'  => 'update',

    'model'   => 'App\Update',

    'columns' => [
        'content' => [
            'title' => 'Update'
        ],
        'created_at' => [
            'title' => 'Date',
        ]
    ],

    'edit_fields' => [
        'content' => [
            'title' => 'Update',
            'type' => 'wysiwyg'
        ],
        'pet' => [
            'type'       => 'relationship',
            'title'      => 'Pet',
            'name_field' => 'name'
        ]
    ],

    'filters'     => [
        'pet' => [
            'type'       => 'relationship',
            'title'      => 'Pet',
            'name_field' => 'name'
        ]
    ],

    'form_width' => 500,

);