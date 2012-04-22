<?php
use Orm\Model;

class Model_Issue extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'description',
		'user',
		'liked',
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

    protected static $_has_many = array(
        'solutions' => array(
            'key_from'        => 'id',   
            'model_to'        => 'Model_Solution',   
            'key_to'          => 'issue_id',   
            'cascade_save'    => true,
            'cascade_delete'  => false,
        ),
        'likes' => array(
            'key_from'        => 'id',
            'model_to'        => 'Model_Like',
            'key_to'          => 'issue_id',
            'cascade_save'    => true,
            'cascade_delete'  => false,
        ),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('user', 'User', 'required|max_length[24]');
		$val->add_field('liked', 'Liked', 'valid_string[numeric]');
		$val->add_field('deleted', 'Deleted', 'valid_string[numeric]');

		return $val;
	}
}
