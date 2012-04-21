<?php

namespace Fuel\Migrations;

class Create_issues
{
	public function up()
	{
		\DBUtil::create_table('issues', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'text'),
			'user' => array('constraint' => 255, 'type' => 'varchar'),
			'deleted' => array('constraint' => 11, 'type' => 'int'),
			'likes' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('issues');
	}
}