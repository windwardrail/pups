<?php

return array(
    'title'       => 'Pictures',

    'single'      => 'picture',

    'model'       => 'App\Picture',

    'columns'     => [
        'url' => [
            'title'  => 'Picture',
            'output' => "<img src='/uploads/pets/originals/(:value)' height='100' />"
        ]
    ],

    'edit_fields' => [
        'url' => array(
            'title'      => 'Picture',
            'type'       => 'image',
            'naming'     => 'random',
            'location'   => public_path() . '/uploads/pets/originals/',
            'size_limit' => 2,
            'sizes'      => array(
                array(232, 216, 'auto', public_path() . '/uploads/pets/square/', 100),
                array(390, 262, 'auto', public_path() . '/uploads/pets/carousel/', 100),
            )
        ),
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
    ]
);