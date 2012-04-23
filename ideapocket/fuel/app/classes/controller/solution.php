<?php
class Controller_Solution extends Controller_Template 
{
    /**
	 * 共通の前処理
	 * 
	 * @access  public
	 */
    public function before()
    {
        parent::before();
    }
    
    
    /**
	 * Solutionの一覧表示
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data['solutions'] = Model_Solution::find('all', array('related'=>'likes'));
        //Debug::dump($data['solutions']);
        
        $this->template->title = "Solutions";
        $this->template->content = View::forge('solution/index', $data);
	}
    
    
    /**
	 * Solutionの個別表示
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_view($id = null)
	{
		$data['solution'] = Model_Solution::find($id);

		is_null($id) and Response::redirect('Solution');

		$this->template->title = "Solution";
		$this->template->content = View::forge('solution/view', $data);

	}
    
    
    /**
	 * Solutionの作成
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_create()
	{
	    $error = false;
	    
	    if(Input::method() == 'POST') {
	        // バリデーターを生成
			$val = Model_Solution::validate('create');
			// 必要な追加データ
			$append_data = array(
			    'url'       => '',
			    'user'      => 'summerwind',
			    'liked'     => 0,
			    'deleted'   => 0,
			);
			
			// バリデーションを実行
			if($val->run($append_data, true)) {
			    // データを取得
			    $data = $val->validated();
			    
			    // Solutionを作成して保存
				$solution = Model_Solution::forge($data);
				if($solution->save()) {
				    // リダイレクト
				    Response::redirect('/issue/'.$data['issue_id']);
				} else {
					$error = true;
				}
			} else {
			    $error = true;
			}
		}
		
		// Issue IDを取得
		$issue_id = $this->param('issue_id');
		
        // Issueリストを取得
        $issue = Model_Issue::find($issue_id, array(
            'related'   => array(
                'likes'     => array(),
                'solutions' => array(
                    'order_by'  => array('id' => 'desc'),
                    'related'   => array('likes'),
                ),
            ),
        ));
        
        // テンプレート変数を設定
		$this->template->title = $issue['title']."いえーい | Idea Pocket";
		$this->template->content = View::forge('issue/view', array(
		    'issue' => $issue,
		    'error' => $error,
		));
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
