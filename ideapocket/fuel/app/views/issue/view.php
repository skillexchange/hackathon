<div class="issue">
    <div class="issue-header">
        <h2><?php echo $issue['title']; ?></h2>
        <ul class="count">
            <li><span><i class="icon-inbox icon-white"></i></span> <?php echo count($issue['solutions']); ?></li>
            <li><span><i class="icon-star icon-white"></i></span> <?php echo count($issue['likes']); ?></li>
        </ul>
    </div>
    
    <?php echo '<p>'.preg_replace("/\r?\n\r?\n/", '</p><p>', $issue['description']).'</p>'; ?>
    
    <ul class="info">
        <li><i class="icon-user"></i> <a href="/user/<?php echo $issue['user']; ?>"><?php echo $issue['user']; ?></a></li>
        <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/like">いいね！</a></li>
        <li><i class="icon-inbox"></i> <a href="#solution-form">課題の解決方法を投稿</a></li>
    </ul>

<?php if(0 < count($issue['solutions'])) { ?>
    <div class="solutions">
        <h3>みんなの解決方法</h3>
<?php foreach($issue['solutions'] as $solution) { ?>
        <div id="solution<?php echo $solution['id']; ?>" class="solution">
            <h4><?php echo $solution['title']; ?></h4>
            <p><?php echo $solution['description']; ?></p>
            <span class="count-mini">★ <?php echo count($solution['likes']); ?></span>
            <ul class="info">
                <li><i class="icon-user"></i> <a href="/user/<?php echo $solution['user']; ?>"><?php echo $solution['user']; ?></a></li>
                <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/solution/<?php echo $solution['id']; ?>/like">いいね！</a></li>
            </ul>
        </div>
<?php } ?>
    </div>
<?php } ?>
    
    <div id="solution-form">
        <h3>課題の解決方法</h3>
        <p>この課題に対する<strong>解決方法</strong>を投稿してください。</p>
<?php if(isset($error) && $error) { ?>
        <div class="alert alert-error">タイトルと具体的な解決方法の内容を入力してください。</div>
<?php } ?>
        <form class="well" method="POST" action="/issue/<?php echo $issue['id']; ?>/solution/create">
            <p><input type="text" placeholder="タイトル" class="span6" name="title"></p>
            <p><textarea placeholder="具体的な解決方法について" rows="5" name="description"></textarea></p>
            <p>
                <input type="hidden" name="issue_id" value="<?php echo $issue['id']; ?>">
                <input type="hidden" name="user" value="dummy">
                <button class="btn" type="submit">投稿</button>
            </p>
        </form>
    </div>
</div>

