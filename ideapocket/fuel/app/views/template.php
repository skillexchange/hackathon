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
                <form class="well" method="POST" action="/issue/create">
                    <p><input type="text" placeholder="タイトル" class="span4" name="title"></p>
                    <p><textarea rows="11" placeholder="具体的な課題について" name="description"></textarea></p>
                    <p><input type="hidden" name="user" value="dummy"><button type="submit" class="btn">投稿</button></p>
                </form>
            </div>
            
            <div class="rank">
                <h3>人気の課題</h3>
                <ol>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 123</span> 
                    </li>
                    <li>
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                        <span class="count-mini">★ 102</span>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 98</span> 
                    </li>
                    <li>
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                        <span class="count-mini">★ 73</span>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 61</span> 
                    </li>
                </ol>
            </div>
  
            <div class="rank">
                <h3>人気の解決方法</h3>
                <ol>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 123</span> 
                    </li>
                    <li>
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                        <span class="count-mini">★ 102</span>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 98</span> 
                    </li>
                    <li>
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                        <span class="count-mini">★ 73</span>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">★ 61</span> 
                    </li>
                </ol>
            </div>
            
            <div class="rank">
                <h3>解決方法の多い課題</h3>
                <ol>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">123</span> 
                    </li>
                    <li>
                        <span class="count-mini">102</span> 
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">98</span> 
                    </li>
                    <li>
                        <a href="#">未来に先回りして点と点をつなげることはできない</a>
                        <span class="count-mini">73</span>
                    </li>
                    <li>
                        <a href="#">信じることが全てを変えてくれる</a>
                        <span class="count-mini">61</span> 
                    </li>
                </ol>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Hacked by <a href="http://farm8.staticflickr.com/7202/6894346123_5e37708b20_z.jpg">Team Messy</a>.<br>
        <small>Build 20120421</small></p>
    </footer>
</body>
</html>
