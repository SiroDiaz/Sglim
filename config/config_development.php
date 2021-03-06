<?php

return [
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'sglim',
        'port' => '3306',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8'
    ],
    'app' => [
        'settings' => [
            'displayErrorDetails' => true,
            'renderer' => [
                'template_path' => TEMPLATEPATH
            ],
            'debug' => true,
            'templates.path' => './App/Views',
            'cookies.encrypt' => true,
            'cookies.lifetime' => '60 minutes',
            'cookies.httponly' => true,
            'cookies.secret_key' => '6vhq@*:T |GuS&pIH6euM.RiKD=H+o3_beh{kSQz-g/=ckh6X=;^~M%/XG|g&gCF'
        ]
    ]
];
