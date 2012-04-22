<?php
/**
 * The development database settings.
 */

return array(
    'default' => array(
        'type' => 'mysql',
        'connection' => array(
            'hostname'  => ':/Applications/MAMP/tmp/mysql/mysql.sock',
            'database'  => 'ideapocket',
            'username'  => 'root',
            'password'  => 'root',
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
        'profiling' => true,
	),
);
