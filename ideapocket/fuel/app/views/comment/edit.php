<h2>Editing Comment</h2>
<br>

<?php echo render('comment/_form'); ?>
<p>
	<?php echo Html::anchor('comment/view/'.$comment->id, 'View'); ?> |
	<?php echo Html::anchor('comment', 'Back'); ?></p>
