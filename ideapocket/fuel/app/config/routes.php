<?php
return array(
    // ------------------------------------------
    // Home
    // ------------------------------------------
	'_root_' => 'issue/index',
	'_404_'  => 'issue/404',
	
	// ------------------------------------------
	// Solution
	// ------------------------------------------
	//'issue/:issue_id/solution/create'               => 'solution/create',
	//'issue/:issue_id/solution/:solution_id/like'    => 'solution/like',
	//
	//// ------------------------------------------
	//// Issue
	//// ------------------------------------------
	'issue/create'          => 'issue/create',
	'issue/:issue_id'       => 'issue/view',
	//'issue/:issue_id/like'  => 'issue/like',
	//
	//// ------------------------------------------
	//// User
	//// ------------------------------------------
	//'user/:user_id' => 'user/view',
	
	// ------------------------------------------
	// API
	// ------------------------------------------
	/*
	'api/issue/post'        => 'api/issue_post',
	'api/issue/:issue'      => 'api/issue_issue',
	'api/issue/:issue/like' => 'api/issue_like',
	'api/issue/:issue/solution/post'            => 'api/solution_post',
	'api/issue/:issue/solution/:solution/like'  => 'api/solution_like',
	'api/user/:id'          => 'api/user_user',
	*/
);
