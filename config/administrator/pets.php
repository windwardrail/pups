<?php

return array(
    'title' => 'Pets',

    'single' => 'pet',

    'model' => 'App\Pet',

    'columns' => [
        'name' => [
            'title' => 'Name'
        ],
        'age' => [
            'title' => 'Age'
        ],
        'breed' => [
            'title' => 'Breed'
        ],
        'story' => [
            'title' => 'Story',
        ]
     ],

    'edit_fields' => [
        'name' => [
            'title' => 'Name',
            'type' => 'text'
        ],
        'age' => [
            'title' => 'Age',
            'type' => 'number'
        ],
        'breed' => [
            'title' => 'Breed',
            'type' => 'text'
        ],
        'story' => [
            'title' => 'Story',
            'type' => 'wysiwyg'
        ]
    ],

    'form_width' => 500,


);