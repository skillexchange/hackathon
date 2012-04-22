<?php

namespace Fuel\Migrations;

class Create_solutions
{
	public function up()
	{
		\DBUtil::create_table('solutions', array(
			'id'            => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'issue_id'      => array('type' => 'int', 'constraint' => 11),
			'title'         => array('type' => 'varchar', 'constraint' => 255),
			'description'   => array('type' => 'text'),
			'user'          => array('type' => 'varchar', 'constraint' => 24),
			'url'           => array('type' => 'text'),
			'liked'         => array('type' => 'int', 'constraint' => 11),
			'deleted'       => array('type' => 'int', 'constraint' => 1),
			'created_at'    => array('type' => 'datetime'),
			'updated_at'    => array('type' => 'datetime'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('solutions');
	}
}