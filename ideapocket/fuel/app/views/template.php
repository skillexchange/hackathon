<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
  <div>
    <div class="row-fluid">
      <div class="span12">
        <h1><?php echo $title; ?></h1> 
        <div class="row-fluid">
          <div class="span3">
            <h2>Submit your issue</h2>
            <form>
              <input type="text" class="span4" placeholder="Issue">
              <p><textarea class="span4" rows="15" placeholder="Description"></textarea></p>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
          <div class="span4"><?php echo $content ?></div>
          <div class="span4"><?php echo $content ?></div>
        </div>
      </div>
    </div>
    
    <footer>
			<p>
				Made by &quot;Team Messy&quot;<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
