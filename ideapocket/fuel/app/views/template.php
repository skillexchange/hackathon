<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
    body {
      padding: 20px 40px;
      border-top: 8px solid #000;
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
    </style>
</head>

<body>
  <div class="row-fluid">
    <div class="span12">
      <div id="content" class="row-fluid">
        <div class="span3">
          <h1><?php echo $title; ?></h1> 
          <p>Submit your issue!</p>
          <form>
            <input type="text" class="span4" placeholder="Issue">
            <p><textarea class="span4" rows="15" placeholder="Description"></textarea></p>
            <button type="submit" class="btn">Submit</button>
          </form>
          
          <h2>いいね数ランキング</h2>
          <h2>ソリューション数ランキング</h2>
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
