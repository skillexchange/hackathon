<?php
use Orm\Model;

class Model_Like extends Model
{
	protected static $_properties = array(
		'id',
		'issue_id',
		'solution_id',
		'user',
		'deleted',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);
	
    protected static $_belongs_to = array('issues', 'solutions');

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('issue_id', 'Issue Id', 'valid_string[numeric]');
		$val->add_field('solution_id', 'Solution Id', 'valid_string[numeric]');
		$val->add_field('user', 'User', 'max_length[24]');
		$val->add_field('deleted', 'Deleted', 'valid_string[numeric]');

		return $val;
	}
}
