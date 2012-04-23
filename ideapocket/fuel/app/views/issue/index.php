<?php foreach($issues as $issue) { ?>
<div id="issue<?php echo $issue['id'] ?>" class="issue">
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
        <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/like" class="like">いいね！</a></li>
        <li><i class="icon-inbox"></i> <a href="/issue/<?php echo $issue['id']; ?>#solution-form">課題の解決方法を投稿</a></li>
        <li><i class="icon-info-sign"></i> <a href="/issue/<?php echo $issue['id']; ?>">詳しくみる</a></li>
    </ul>

<?php if(0 < count($issue['solutions'])) { ?>
    <div class="solutions">
        <h3>みんなの解決方法</h3>
<?php $count = 0; ?>
<?php foreach($issue['solutions'] as $solution) { ?>
<?php if(3 <= $count) { break; } else { $count++; } ?>
        <div class="solution">
            <p><?php echo $solution['title']; ?></p>
            <span class="count-mini">★ <?php echo count($solution['likes']); ?></span>
            <ul class="info">
                <li><i class="icon-user"></i> <a href="/user/<?php echo $solution['user']; ?>"><?php echo $solution['user']; ?></a></li>
                <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/solution/<?php echo $solution['id']; ?>/like">いいね！</a></li>
                <li><i class="icon-info-sign"></i> <?php echo Html::anchor('issue/view/'.$issue->id.'#solution'.$solution->id , '詳しくみる'); ?></li>
            </ul>
        </div>
<?php } ?>
    </div>
<?php } ?>
</div>

<?php } ?>

<div class="pagination pagination-centered">
    <?php echo Pagination::create_links(); ?>
</div>

