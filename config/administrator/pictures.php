<?php

return array(
    'title'       => 'Pictures',

    'single'      => 'picture',

    'model'       => 'App\Picture',

    'columns'     => [
        'url' => [
            'title'  => 'Picture',
            'output' => "<img src='/uploads/pets/original/(:value)' height='100' />"
        ]
    ],

    'edit_fields' => [
        'url' => array(
            'title'      => 'Picture',
            'type'       => 'image',
            'naming'     => 'random',
            'location'   => public_path() . '/uploads/pets/original/',
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
    ],

    'actions' => [
        'make_default' => [
            'title' => 'Make Default',
            'messages' => [
                'success' => 'This picture is now the default image for its pet.',
                'error' => 'There was an error!',
                'active' => 'Making changes...'
            ],
            'action' => function(&$picture){
                $pet = $picture->pet;

                /* reset the default status of all pictures for this pet */
                $pet->pictures->each(function($pet){
                    $pet->is_default = false;
                    $pet->save();
                });

                $picture->is_default = true;
                $picture->save();

                return true;
            }
        ]
    ]
);