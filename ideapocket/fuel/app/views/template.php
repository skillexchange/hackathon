<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
	<style>
    body {
      padding: 20px 40px;
      border-top: 8px solid #000;
    }
    
    header {
        padding: 0 0 20px 0;
    }
    
    h1 {
        font-family: 'Fredoka One', sans-serif;
    }
    
    #content {
      margin: 20px 0 0; 
    }

    .issue {
        padding: 0 0 30px 0;
    }

    .issue h2 {
        position: relative;
    }

    .issue h2 a {
        position: absolute;
        right: 0;
        font-size: 12px;
        color: white;
        background-color: #0069d6;
        line-height: 1;
        padding: 7px;
    }

    .solution {
        border-bottom: 1px solid #ccc;
        list-style: none;
    }

    .solution dt {
        padding: 8px 0 2px 0;
        position: relative;
        border-top: 1px solid #ccc;
    }

    .solution dt a {
        position: absolute;
        right: 0;
        font-size: 12px;
        color: white;
        background-color: #0069d6;
        line-height: 1;
        padding: 4px;
    }

    .solution dd {
        margin: 0;
    }

    .solution dd ul {
        margin: 0;
        list-style: none;
    }

    .solution dd ul li {
        padding: 2px 0 0;
        border-bottom: 1px solid #ccc;
    }
    
    .rank {
        padding-bottom: 20px;
    }
    
    .rank h2 {
        font-size: 15px;
        border-bottom: 1px solid #ccc;
    }
    
    .rank ol {
        margin: 0;
        list-style: none;
    }
    
    .rank ol li {
        padding: 5px 0;
        border-bottom: 1px solid #ccc;
    }
    
    .rank ol li span {
        width: 20px;
        margin: 0 5px 0 0;
        text-align: center;
        display: inline-block;
    }
    </style>
</head>

<body>
    <div class="row-fluid">
        <div class="span12">
            <div id="content" class="row-fluid">
                <div class="span3">
                    <header>
                        <h1><?php echo $title; ?></h1> 
                        <p>Submit your issue!</p>
                    </header>
                    
                    <form class="well">
                        <input type="text" placeholder="Issue"><br>
                        <textarea rows="13" placeholder="Description"></textarea><br>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                    
                    <div class="rank">
                        <h2>Like Ranking</h2>
                        <ol>
                            <li><span class="badge badge-info">123</span> <a href="#">こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは</a></li>
                            <li><span class="badge badge-info">18</span> <a href="#">Issue No.2</a></li>
                            <li><span class="badge badge-info">10</span> <a href="#">Issue No.3</a></li>
                            <li><span class="badge badge-info">8</span> <a href="#">Issue No.4</a></li>
                            <li><span class="badge badge-info">3</span> <a href="#">Issue No.5</a></li>
                        </ol>
                    </div>
          
                    <div class="rank">
                        <h2>Solution Ranking</h2>
                        <ol>
                            <li><span class="badge badge-info">23</span> <a href="#">Issue No.1</a></li>
                            <li><span class="badge badge-info">18</span> <a href="#">Issue No.2</a></li>
                            <li><span class="badge badge-info">10</span> <a href="#">Issue No.3</a></li>
                            <li><span class="badge badge-info">8</span> <a href="#">Issue No.4</a></li>
                            <li><span class="badge badge-info">3</span> <a href="#">Issue No.5</a></li>
                        </ol>
                    </div>
                </div>
                <div class="span9"><?php echo $content ?></div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>
        Made by &quot;Team Messy&quot;<br>
        <small>Version: 0.1b</small>
        </p>
    </footer>
</body>
</html>
