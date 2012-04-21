<?php
class Controller_Like extends Controller_Template 
{

	public function action_index()
	{
		$data['likes'] = Model_Like::find('all');
		$this->template->title = "Likes";
		$this->template->content = View::forge('like/index', $data);

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
		if (Input::method() == 'POST')
		{
			$val = Model_Like::validate('create');
			
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

		$this->template->title = "Likes";
		$this->template->content = View::forge('like/create');

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