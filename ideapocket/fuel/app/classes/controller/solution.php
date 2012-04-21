<?php
class Controller_Solution extends Controller_Template 
{
  public function before($data=null)
  {
      parent::before();
      $this->auto_render=false;
  
  }

	public function action_index()
	{
		$data['solutions'] = Model_Solution::find('all', array('related'=>'likes'));
//    Debug::dump($data['solutions']);
//		$this->template->title = "Solutions";
//		$this->template->content = View::forge('solution/index', $data);

	}

	public function action_view($id = null)
	{
		$data['solution'] = Model_Solution::find($id);

		is_null($id) and Response::redirect('Solution');

		$this->template->title = "Solution";
		$this->template->content = View::forge('solution/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Solution::validate('create');
			
			if ($val->run())
			{
				$solution = Model_Solution::forge(array(
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'user' => Input::post('user'),
					'url' => Input::post('url'),
					'issue_id' => Input::post('issue_id'),
					'deleted' => Input::post('deleted'),
					'liked' => Input::post('liked'),
				));

				if ($solution and $solution->save())
				{
					Session::set_flash('success', 'Added solution #'.$solution->id.'.');

					Response::redirect('solution');
				}

				else
				{
					Session::set_flash('error', 'Could not save solution.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Solutions";
		$this->template->content = View::forge('solution/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Solution');
    $view = View::forge('template_default');

		$solution = Model_Solution::find($id);

		$val = Model_Solution::validate('edit');

		if ($val->run())
		{
			$solution->title = Input::post('title');
			$solution->description = Input::post('description');
			$solution->user = Input::post('user');
			$solution->url = Input::post('url');
			//$solution->issue_id = Input::post('issue_id');
			//$solution->deleted = Input::post('deleted');
			//$solution->liked = Input::post('liked');

			if ($solution->save())
			{
				Session::set_flash('success', 'Updated solution #' . $id);

				Response::redirect('issue');
			}

			else
			{
				Session::set_flash('error', 'Could not update solution #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$solution->title = $val->validated('title');
				$solution->description = $val->validated('description');
				$solution->user = $val->validated('user');
				$solution->url = $val->validated('url');
				$solution->issue_id = $val->validated('issue_id');
				$solution->deleted = $val->validated('deleted');
				$solution->liked = $val->validated('liked');

				Session::set_flash('error', $val->show_errors());
			}

      $view->set_global('solution', $solution);
		}

    $view->set_global('title', "Solutions");
		$view->content = View::forge('solution/edit');

    return $view;
	}

	public function action_delete($id = null)
	{
		if ($solution = Model_Solution::find($id))
		{
			$solution->delete();

			Session::set_flash('success', 'Deleted solution #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete solution #'.$id);
		}

		Response::redirect('solution');

	}


}
