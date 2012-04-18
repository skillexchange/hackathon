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
            <form>
              <label>Issue</label>
              <input type="text" class="span4">
              <label>Description</label>
              <p><textarea class="span4" rows="15"></textarea></p>
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
