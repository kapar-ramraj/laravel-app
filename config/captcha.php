<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',

    'default' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'bgImage' => false,
        'bgColor' => '#ffffff',
        'fontColors' => ['#000000'],
        'contrast' => -5,
        'sharpen' => 10,
        'angle' => 15,
        'lines' => 5,
        'noise' => 0,
        'invert' => false,
        'sensitive' => false,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
        'font' => null,
        'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',
        'driver' => 'gd', // ✅ make sure this is set
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],

    'flat' => [
        'length' => 6,
        'width' => 160,
        'height' => 46,
        'quality' => 90,
        'lines' => 6,
        'bgImage' => false,
        'bgColor' => '#ecf2f4',
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast' => -5,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];
