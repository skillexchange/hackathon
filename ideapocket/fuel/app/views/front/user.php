<?php foreach($issues as $issue) { ?>
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
        <li><i class="icon-inbox"></i> <a href="/issue/<?php echo $issue['id']; ?>#solution-form">課題の解決方法を投稿</a></li>
        <li><i class="icon-info-sign"></i> <a href="/issue/<?php echo $issue['id']; ?>">詳しくみる</a></li>
    </ul>
</div>
<?php } ?>

