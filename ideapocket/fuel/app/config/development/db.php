<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
      'type'=>'mysqli',
		'connection'  => array(
			'hostname'        => 'localhost',
      'database'   => 'ideapocket',
			'username'   => 'root',
			'password'   => '',
		),
    'table_prefix'=>'',
    'charset'=>'utf8',
    'caching'=>false,
    'profiling'=>true,
	),
);
