<?php
use \Model\Solution;

class Controller_Issue extends Controller_Template 
{
    /**
     * 共通テンプレートの無効化
     * 
     * @access  public
     *
     * If you want to use the template layout, you will have to write $this->response->body = $this->template;
     * If you don't want to use the template layout, write $this->response->body = View::forge('test/index', $data);
     * more detail read: http://docs.fuelphp.com/general/controllers/template.html  
     */
    public function before()
    {
        parent::before();
        $this->auto_render=false;
    }
    
    
    /**
     * Issueの一覧表示
     * 
     * @access  public
     * @return  Response
     */
    public function action_index()
    {   
        // ページ数を取得
        $current_page = $this->param('page');
        if(is_null($current_page)) {
            $current_page = 1;
        }
        
        // クエリを生成
        $query = Model_Issue::find();
        $query->order_by('id', 'desc');
        $query->related(array(
            'likes'     => array(),
            'solutions' => array(
                'order_by'  => array('id' => 'desc'),
                'related'   => array('likes'),
            ),
        ));
        $solutions = Model_Solution::find('all',array(
            'order_by' => array('liked'=>'desc'),
            'limit'=>5
        ));
        
        // Issueの件数を取得
        $total = $query->count();
        
        // Paginationの設定
        Pagination::set_config(array(
            'pagination_url'    => 'page',
            'total_items'       => $total,
            'per_page'          => 5,
            'uri_segment'       => 2,
        ));
        
        // Issueリストの取得
        $issues = $query->limit(Pagination::$per_page)->offset(Pagination::$offset)->get();

        // テンプレート変数を設定
        $this->template->title = "Idea Pocket";
        $this->template->content = View::forge('issue/index', array(
            'issues'    => $issues,
            'message'   => Session::get_flash('issue'),
        ));
        $this->template->rank = View::forge('issue/rank', array(
            'issues'=>$issues,
            'solutions'=>$solutions
        ));
        //テンプレートを使いたい場合は必ずresponse->bodyに入れる。
        $this->response->body=$this->template;
    }

    
  /**
   * Issueの個別表示
   * 
   * @access  public
   * @return  Response
   */
  public function action_view()
  {
      // Issue IDを取得
      $issue_id = $this->param('issue_id');
      
      // Issue IDが未指定ならば404
      if(is_null($this->param('issue_id'))) {
          return Response::forge(ViewModel::forge('issue/404'), 404);
      }
      
      // Issue情報を取得
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
     $this->template->title = $issue['title']." | Idea Pocket";
     $this->template->content = View::forge('issue/view', array('issue' => $issue));
     $this->response->body = $this->template;
  }

    
    /**
   * Issueの作成
   * 
   * @access  public
   * @return  Response
   */
  public function action_create()
  {
      $view = View::forge('template_default');
      $error = false;
      
      if(Input::method() == 'POST') {
          // バリデーターを生成
      $val = Model_Issue::validate('create');
      // 必要な追加データ
      $append_data = array(
          'user'      => 'summerwind',
          'liked'     => 0,
          'deleted'   => 0,
      );
      
      // バリデーションを実行
      if($val->run($append_data, true)) {
          // データを取得
          $data = $val->validated();
          
          // Issueを作成して保存
        $issue = Model_Issue::forge($data);
        if($issue->save()) {
            // リダイレクト
            //Response::redirect('/');
        } else {
            Session::set_flash('error', 'Could not create issue #' . $id);
        }
      } else {
            Session::set_flash('error', 'Could not create issue #' . $id);
      }
    }
    
        // Issueリストの取得
        $issues = Model_Issue::find('all', array(
            'order_by'  => array('id' => 'desc'),
            'limit'     => 10,
            'related'   => array(
                'likes'     => array(),
                'solutions' => array(
                    'order_by'  => array('id' => 'desc'),
                    'related'   => array('likes'),
                ),
            ),
        ));
        
        // テンプレート変数を設定
    $view->set_global('title', 'Idea Pocket');
    $view->content=View::forge('issue/create');

    return $view;
  }

    
    /**
   * Issueの編集
   * 
   * @access  public
   * @return  Response
   */
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

    
    /**
   * Issueの削除
   * 
   * @access  public
   * @return  Response
   */
  public function action_delete($id = null)
  {
    if($issue = Model_Issue::find($id)) {
      $issue->delete();
      Session::set_flash('success', 'Deleted issue #'.$id);
    } else {
      Session::set_flash('error', 'Could not delete issue #'.$id);
    }

    Response::redirect('issue');
  }
}
