<?php
return array(
    // ------------------------------------------
    // Home
    // ------------------------------------------
	'_root_'            => 'issue/index',
	'_404_'             => 'issue/404',
	
	// ------------------------------------------
	// Issue
	// ------------------------------------------
	'issue/create'      => 'issue/create',
	'issue/:issue'      => 'issue/view',
	'issue/:issue/like' => 'issue/like',
	
	// ------------------------------------------
	// Solution
	// ------------------------------------------
	'issue/:issue/solution/create'          => 'solution/create',
	'issue/:issue/solution/:solution/like'  => 'solution/like',
	
	// ------------------------------------------
	// User
	// ------------------------------------------
	'user/:id' => 'user/view',
	
	// ------------------------------------------
	// API
	// ------------------------------------------
	'api/issue/post'        => 'api/issue_post',
	'api/issue/:issue'      => 'api/issue_issue',
	'api/issue/:issue/like' => 'api/issue_like',
	'api/issue/:issue/solution/post'            => 'api/solution_post',
	'api/issue/:issue/solution/:solution/like'  => 'api/solution_like',
	'api/user/:id'          => 'api/user_user',
);
