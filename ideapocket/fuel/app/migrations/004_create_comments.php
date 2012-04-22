<?php

namespace Fuel\Migrations;

class Create_comments
{
	public function up()
	{
		\DBUtil::create_table('comments', array(
			'id'            => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'message'       => array('type' => 'text'),
			'user'          => array('type' => 'varchar', 'constraint' => 24),
			'liked'         => array('type' => 'int', 'constraint' => 11),
			'deleted'       => array('type' => 'int', 'constraint' => 1),
			'created_at'    => array('type' => 'datetime'),
			'updated_at'    => array('type' => 'datetime'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}