<?php

namespace Fuel\Migrations;

class Create_likes
{
	public function up()
	{
		\DBUtil::create_table('likes', array(
			'id'            => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'issue_id'      => array('type' => 'int', 'constraint' => 11, 'null' => true),
			'solution_id'   => array('type' => 'int', 'constraint' => 11, 'null' => true),
			'user'          => array('type' => 'varchar', 'constraint' => 24),
			'deleted'       => array('type' => 'int', 'constraint' => 1),
			'created_at'    => array('type' => 'datetime'),
			'updated_at'    => array('type' => 'datetime'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('likes');
	}
}