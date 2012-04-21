<div class="issue">
    <div class="issue-header">
        <h2><?php echo $issue['title']; ?></h2>
        <ul class="count">
            <li><span><i class="icon-inbox icon-white"></i></span> <?php echo count($issue['solutions']); ?></li>
            <li><span><i class="icon-star icon-white"></i></span> <?php echo $issue['like']; ?></li>
        </ul>
    </div>
    
    <?php echo '<p>'.str_replace("\n\n", '</p><p>', $issue['description']).'</p>'; ?>
    
    <ul class="info">
        <li><i class="icon-user"></i> <a href="/user/<?php echo $issue['user']; ?>"><?php echo $issue['user']; ?></a></li>
        <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/like">いいね！</a></li>
        <li><i class="icon-inbox"></i> <a href="#solution-form">課題の解決方法を投稿</a></li>
    </ul>
    
    <div class="solutions">
        <h3>みんなの解決方法</h3>
<?php foreach($issue['solutions'] as $solution) { ?>
        <div id="solution<?php echo $solution['id']; ?>" class="solution">
            <h4><?php echo $solution['title']; ?></h4>
            <p><?php echo $solution['description']; ?></p>
            <span class="count-mini">★ <?php echo $solution['like']; ?></span>
            <ul class="info">
                <li><i class="icon-user"></i> <a href="/user/<?php echo $solution['user']; ?>"><?php echo $solution['user']; ?></a></li>
                <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/solution/<?php echo $solution['id']; ?>/like">いいね！</a></li>
            </ul>
        </div>
<?php } ?>
    </div>
    
    <div id="solution-form">
        <h3>課題の解決方法</h3>
        <p>この課題に対する<strong>解決方法</strong>を投稿してください。</p>
        <form class="well">
            <p><input type="text" placeholder="タイトル" class="span6"></p>
            <p><textarea placeholder="具体的な解決方法について" rows="5"></textarea></p>
            <p><button class="btn" type="submit">投稿</button></p>
        </form>
    </div>
</div>

