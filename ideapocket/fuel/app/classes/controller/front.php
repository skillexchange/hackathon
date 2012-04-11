<?php

class Controller_Front extends Controller_Template
{
	/**
	 * メインページ
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->template->title = 'Idea Pocket';
		$this->template->content = View::forge('front/index');
	}
	
	/**
	 * 404ページ
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('front/404'), 404);
	}
}
