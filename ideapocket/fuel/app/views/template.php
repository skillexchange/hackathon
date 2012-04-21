<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('ideapocket.css'); ?>
	<link href='http://fonts.googleapis.com/css?family=Signika:700' rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <h1><?php echo $title; ?>*</h1> 
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
                <form class="well">
                    <p><input type="text" placeholder="タイトル" class="span4"></p>
                    <p><textarea rows="13" placeholder="具体的な課題について"></textarea></p>
                    <p><button type="submit" class="btn">投稿</button></p>
                </form>
            </div>
            
            <div class="rank">
                <h3>人気の課題</h3>
                <ol>
                    <li><span class="badge">123</span> <a href="#">こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは</a></li>
                    <li><span class="badge">112</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">98</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">73</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">61</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">48</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">23</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">17</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                </ol>
            </div>
  
            <div class="rank">
                <h3>人気の解決方法</h3>
                <ol>
                    <li><span class="badge badge-inverse">123</span> <a href="#">こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは、こんにちは</a></li>
                    <li><span class="badge badge-inverse">112</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">98</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">73</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">61</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">48</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                    <li><span class="badge badge-inverse">23</span> <a href="#">信じることが全てを変えてくれる</a></li>
                    <li><span class="badge badge-inverse">17</span> <a href="#">未来に先回りして点と点をつなげることはできない</a></li>
                </ol>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Hacked by Team Messy<br>
        <small>Build 20120421</small></p>
    </footer>
</body>
</html>
