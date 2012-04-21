<?php
class Controller_Comment extends Controller_Template 
{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/index', $data);

	}

	public function action_view($id = null)
	{
		$data['comment'] = Model_Comment::find($id);

		is_null($id) and Response::redirect('Comment');

		$this->template->title = "Comment";
		$this->template->content = View::forge('comment/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');
			
			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'description' => Input::post('description'),
					'user' => Input::post('user'),
					'deleted' => Input::post('deleted'),
					'likes' => Input::post('likes'),
				));

				if ($comment and $comment->save())
				{
					Session::set_flash('success', 'Added comment #'.$comment->id.'.');

					Response::redirect('comment');
				}

				else
				{
					Session::set_flash('error', 'Could not save comment.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Comment');

		$comment = Model_Comment::find($id);

		$val = Model_Comment::validate('edit');

		if ($val->run())
		{
			$comment->description = Input::post('description');
			$comment->user = Input::post('user');
			$comment->deleted = Input::post('deleted');
			$comment->likes = Input::post('likes');

			if ($comment->save())
			{
				Session::set_flash('success', 'Updated comment #' . $id);

				Response::redirect('comment');
			}

			else
			{
				Session::set_flash('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->description = $val->validated('description');
				$comment->user = $val->validated('user');
				$comment->deleted = $val->validated('deleted');
				$comment->likes = $val->validated('likes');

				Session::set_flash('error', $val->show_errors());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/edit');

	}

	public function action_delete($id = null)
	{
		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', 'Deleted comment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('comment');

	}


}