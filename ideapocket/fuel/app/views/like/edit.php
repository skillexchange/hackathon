<h2>Editing Like</h2>
<br>

<?php echo render('like/_form'); ?>
<p>
	<?php echo Html::anchor('like/view/'.$like->id, 'View'); ?> |
	<?php echo Html::anchor('like', 'Back'); ?></p>
