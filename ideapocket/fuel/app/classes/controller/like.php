<?php
class Controller_Like extends Controller_Template 
{

  public function before($data=null)
  {
      parent::before();
      $this->auto_render=false;
  
  }
	public function action_index()
	{
		$data['likes'] = Model_Like::find('all');
		$this->template->title = "Likes";
		$this->template->content = View::forge('like/index', $data);
    $this->response->body=$this->template;

	}

	public function action_view($id = null)
	{
		$data['like'] = Model_Like::find($id);

		is_null($id) and Response::redirect('Like');

		$this->template->title = "Like";
		$this->template->content = View::forge('like/view', $data);

	}

	public function action_create()
	{
    $view = View::forge('template_default');
		if (Input::method() == 'POST')
		{
			$val = Model_Like::validate('create');
			
      //Todo need user check
			if ($val->run())
			{
				$like = Model_Like::forge(array(
					'issue_id' => Input::post('issue_id'),
					'solution_id' => Input::post('solution_id'),
					'user' => Input::post('user'),
					'deleted' => Input::post('deleted'),
				));

				if ($like and $like->save())
				{
					Session::set_flash('success', 'Added like #'.$like->id.'.');

					Response::redirect('like');
				}

				else
				{
					Session::set_flash('error', 'Could not save like.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

    $view->set_global('title','Likes');
		$view->content = View::forge('like/create');

    return $view;
	}
	public function action_add()
	{
    $view = View::forge('template_json');
		if (Input::method() == 'POST')
		{
			$val = Model_Like::validate('create');
      //If both of id are empty, add_like fail.
      $idcheck=true;
      if(Input::post('issue_id') === '' && Input::post('solution_id') === '' ){
          $idcheck=false;
					Session::set_flash('error', 'both of ids are empty!');
      }
			
      //Todo need user check
			if ($idcheck && $val->run())
			{
				$like = Model_Like::forge(array(
					'issue_id' => Input::post('issue_id'),
					'solution_id' => Input::post('solution_id'),
					'user' => 'kyagi',
					'deleted' => 0,
				));

				if ($like and $like->save())
				{
					Session::set_flash('success', 'Added like #'.$like->id.'.');
				}

				else
				{
					Session::set_flash('error', 'Could not save like.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

    $view->set_global('title','Likes');
    return $view;
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Like');

		$like = Model_Like::find($id);

		$val = Model_Like::validate('edit');

		if ($val->run())
		{
			$like->issue_id = Input::post('issue_id');
			$like->solution_id = Input::post('solution_id');
			$like->user = Input::post('user');
			$like->deleted = Input::post('deleted');

			if ($like->save())
			{
				Session::set_flash('success', 'Updated like #' . $id);

				Response::redirect('like');
			}

			else
			{
				Session::set_flash('error', 'Could not update like #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$like->issue_id = $val->validated('issue_id');
				$like->solution_id = $val->validated('solution_id');
				$like->user = $val->validated('user');
				$like->deleted = $val->validated('deleted');

				Session::set_flash('error', $val->show_errors());
			}

			$this->template->set_global('like', $like, false);
		}

		$this->template->title = "Likes";
		$this->template->content = View::forge('like/edit');

	}

	public function action_delete($id = null)
	{
		if ($like = Model_Like::find($id))
		{
			$like->delete();

			Session::set_flash('success', 'Deleted like #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete like #'.$id);
		}

		Response::redirect('like');

	}


}
