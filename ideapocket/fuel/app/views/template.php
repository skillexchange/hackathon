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
    
    <div id="content" class="row-fluid">
        <div id="main" class="span8">
            <?php echo $content ?>
        </div>
        
        <div id="aside" class="span4">
            <div id="issue-form">
                <h2>解決するべき課題</h2>
                <p>あなたが解決するべきだと思う<strong>課題</strong>を投稿してください。</p>
<?php if(isset($error) && $error) { ?>
                <div class="alert alert-error">タイトルと具体的な課題の内容を入力してください。</div>
<?php } ?>
                <?php echo Html::anchor('issue/create', 'Add new Issue', array('class' => 'btn success')); ?>
            </div>
            
            <?php  echo $rank; ?>
        </div>
    </div>
    
    <footer>
        <p>Hacked by <a href="http://farm8.staticflickr.com/7202/6894346123_5e37708b20_z.jpg">Team Messy</a>.<br>
        <small>Build 20120421</small></p>
    </footer>
</body>
</html>
