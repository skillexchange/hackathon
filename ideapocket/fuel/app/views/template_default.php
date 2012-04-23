<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('ideapocket.css'); ?>
	<?php echo Asset::css('http://fonts.googleapis.com/css?family=Signika:700'); ?>
</head>

<body>
    <header>
        <h1><a href="/">Idea Pocket*</a></h1> 
        <p>Think, Imagine, Hack!</p>
    </header>

<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>

    <div id="content" class="row-fluid">
        <div id="main" class="span8">
            <?php echo $content ?>
        </div>

    </div>
    
    <footer>
        <p>Hacked by <a href="http://farm8.staticflickr.com/7202/6894346123_5e37708b20_z.jpg">Team Messy</a>.<br>
        <small>Build 20120421</small></p>
    </footer>
</body>
</html>
