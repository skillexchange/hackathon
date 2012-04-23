<?php
/**
 * The development database settings.
 */

return array(
    'default' => array(
        'type' => 'mysql',
        'connection' => array(
            //'hostname'  => ':/Applications/MAMP/tmp/mysql/mysql.sock',
            'hostname'  => ':/opt/local/var/run/mysql5/mysqld.sock',
            'database'  => 'ideapocket',
            'username'  => 'root',
            'password'  => '',
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
        'profiling' => true,
	),
);
