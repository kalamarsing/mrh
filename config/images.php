<?php

return [
    'storage_directory' => 'public/medias',

    'display' => 'thumbnail',

    'formats' => [
        [
            'name' => 'large',
            'directory' => 'large',
            'ratio' => '',
            'width' => 1920,
            'height' => 1080
        ],
        [
            'name' => 'medium',
            'directory' => 'medium',
            'ratio' => '16:9',
            'width' => 1920,
            'height' => 1080
        ],
        [
            'name' => 'small',
            'directory' => 'small',
            'ratio' => '16:9',
            'width' => 768,
            'height' => 432
        ],
        [
            'name' => 'thumbnail',
            'directory' => 'thumbnail',
            'ratio' => '1:1',
            'width' => 225,
            'height' => 225
        ]
    ]

];
