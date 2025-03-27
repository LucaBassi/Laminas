<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

#return [
#    'db' => [
#        'driver' => 'Pdo',
#        'dsn'    => 'mysql:dbname=album;user=album;password=album;host=localhost;charset=utf8',
#    ],
#];


return [
    'db' => [
        'driver'    => 'PdoMysql',
        'hostname'  => 'localhost',
        'database'  => 'album',
        'username'  => 'album',
        'password'  => 'album',
    ],
    'service_manager' =>[
        'factories' => [
            \Laminas\Db\Adapter\Adapter::class => \Laminas\Db\Adapter\AdapterServiceFactory::class,
        ],
    ],
];
