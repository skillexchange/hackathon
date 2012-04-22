<?php foreach($issues as $issue) { ?>
<div class="issue">
    <div class="issue-header">
        <h2><?php echo $issue['title']; ?></h2>
        <ul class="count">
            <li><span><i class="icon-inbox icon-white"></i></span> <?php echo count($issue['solutions']); ?></li>
            <li><span><i class="icon-star icon-white"></i></span> <?php echo count($issue['likes']); ?></li>
        </ul>
    </div>
    
    <?php echo '<p>'.str_replace("\n\n", '</p><p>', $issue['description']).'</p>'; ?>
    
    <ul class="info">
        <li><i class="icon-user"></i> <a href="/user/<?php echo $issue['user']; ?>"><?php echo $issue['user']; ?></a></li>
        <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/like">いいね！</a></li>
        <li><i class="icon-inbox"></i> <a href="/issue/<?php echo $issue['id']; ?>#solution-form">課題の解決方法を投稿</a></li>
        <li><i class="icon-info-sign"></i> <a href="/issue/<?php echo $issue['id']; ?>">詳しくみる</a></li>
    </ul>

<?php if(0 < count($issue['solutions'])) { ?>
    <div class="solutions">
        <h3>みんなの解決方法</h3>
<?php for($ix=4; $ix>=2; $ix--) { ?>
<?php if(isset($issue['solutions'][$ix])) { ?>
        <?php $solution = $issue['solutions'][$ix]; ?>
        <div class="solution">
            <p><?php echo $solution['title']; ?></p>
            <span class="count-mini">★ <?php echo count($solution['likes']); ?></span>
            <ul class="info">
                <li><i class="icon-user"></i> <a href="/user/<?php echo $solution['user']; ?>"><?php echo $solution['user']; ?></a></li>
                <li><i class="icon-star"></i> <a href="/issue/<?php echo $issue['id']; ?>/solution/<?php echo $solution['id']; ?>/like">いいね！</a></li>
                <li><i class="icon-info-sign"></i> <a href="/issue/<?php echo $issue['id']; ?>#solution<?php echo $solution['id']; ?>">詳しくみる</a></li>
            </ul>
        </div>
<?php } ?>
<?php } ?>
    </div>
<?php } ?>
</div>

<?php } ?>

<div class="pagination pagination-centered">
    <ul>
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>

