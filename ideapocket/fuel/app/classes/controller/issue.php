<?php
class Controller_Issue extends Controller_Template 
{

  public function before($data=null)
  {
      parent::before();
      $this->auto_render=false;
  
  }
	public function action_index()
	{
    $data['issues'] = Model_Issue::find('all', array(
        'related'=> array(
            'solutions'=>array(
                'order_by'=>array('liked'=>'desc'),
                'related'=>array('likes')
            ),
            'likes'
        )
    ));
    #Debug::dump($data['issues']);
		$this->template->title = "Issues";
  	$this->template->content = View::forge('issue/index', $data);
    $this->response->body = $this->template;
	}

	public function action_view($id = null)
	{
		$data['issue'] = Model_Issue::find($id, array('related'=>array('solutions', 'likes')));

		is_null($id) and Response::redirect('Issue');

		$this->template->title = "Issue";
		$this->template->content = View::forge('issue/view', $data);
    $this->response->body = $this->template;

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Issue::validate('create');
			
			if ($val->run())
			{
				$issue = Model_Issue::forge(array(
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'user' => Input::post('user'),
					'deleted' => Input::post('deleted'),
					'likes' => Input::post('likes'),
				));

				if ($issue and $issue->save())
				{
					Session::set_flash('success', 'Added issue #'.$issue->id.'.');

					Response::redirect('issue');
				}

				else
				{
					Session::set_flash('error', 'Could not save issue.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Issues";
		$this->template->content = View::forge('issue/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Issue');
    $view = View::forge('template_default');

		$issue = Model_Issue::find($id);

		$val = Model_Issue::validate('edit');

		if ($val->run())
		{
			$issue->title = Input::post('title');
			$issue->description = Input::post('description');
			//$issue->user = Input::post('user');
			//$issue->deleted = Input::post('deleted');
			//$issue->likes = Input::post('likes');

			if ($issue->save())
			{
				Session::set_flash('success', 'Updated issue #' . $id);

				Response::redirect('issue');
			}

			else
			{
				Session::set_flash('error', 'Could not update issue #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$issue->title = $val->validated('title');
				$issue->description = $val->validated('description');
				$issue->user = $val->validated('user');
				$issue->deleted = $val->validated('deleted');
				$issue->likes = $val->validated('likes');

				Session::set_flash('error', $val->show_errors());
			}

      $view->set_global('issue', $issue);
		}
    $view->set_global('title', 'Issue');
    $view->content=View::forge('issue/edit');

    return $view;
	}

	public function action_delete($id = null)
	{
		if ($issue = Model_Issue::find($id))
		{
			$issue->delete();

			Session::set_flash('success', 'Deleted issue #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete issue #'.$id);
		}

		Response::redirect('issue');

	}


}
