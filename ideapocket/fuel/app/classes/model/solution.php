<?php
use Orm\Model;

class Model_Solution extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'description',
		'user',
		'url',
		'issue_id',
		'deleted',
		'liked',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('user', 'User', 'required|max_length[255]');
		$val->add_field('url', 'Url', 'valid_url');
		$val->add_field('issue_id', 'Issue Id', 'required|valid_string[numeric]');
		$val->add_field('deleted', 'Deleted', 'valid_string[numeric]');
		$val->add_field('liked', 'Liked', 'valid_string[numeric]');

		return $val;
	}
  protected static $_belongs_to = array('issues');
  protected static $_has_many = array(
      'likes'=>array(
          'key_from' => 'id',   
          'model_to' => 'Model_Like',   
          'key_to' => 'solution_id',   
          'cascade_save' => true,   
          'cascade_delete' => false,   
      ) 
  ); 

}
