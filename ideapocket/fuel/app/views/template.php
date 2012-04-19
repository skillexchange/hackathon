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
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
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
