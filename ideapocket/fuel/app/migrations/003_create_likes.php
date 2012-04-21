<?php

namespace Fuel\Migrations;

class Create_likes
{
	public function up()
	{
		\DBUtil::create_table('likes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'issue_id' => array('constraint' => 11, 'type' => 'int'),
			'solution_id' => array('constraint' => 11, 'type' => 'int'),
			'user' => array('constraint' => 255, 'type' => 'varchar'),
			'deleted' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('likes');
	}
}