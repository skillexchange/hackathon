<?php

namespace Fuel\Migrations;

class Create_issues
{
	public function up()
	{
		\DBUtil::create_table('issues', array(
			'id'            => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'title'         => array('type' => 'varchar', 'constraint' => 255),
			'description'   => array('type' => 'text'),
			'user'          => array('type' => 'varchar', 'constraint' => 24),
			'deleted'       => array('type' => 'int', 'constraint' => 1, ),
			'liked'         => array('type' => 'int', 'constraint' => 11, ),
			'created_at'    => array('type' => 'datetime'),
			'updated_at'    => array('type' => 'datetime'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('issues');
	}
}