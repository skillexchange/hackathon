<?php

namespace Fuel\Migrations;

class Create_solutions
{
	public function up()
	{
		\DBUtil::create_table('solutions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'text'),
			'user' => array('constraint' => 255, 'type' => 'varchar'),
			'url' => array('type' => 'text'),
			'issue_id' => array('constraint' => 11, 'type' => 'int'),
			'deleted' => array('constraint' => 11, 'type' => 'int'),
			'likes' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('solutions');
	}
}