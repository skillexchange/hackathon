<h2>Editing Issue</h2>
<br>

<?php echo render('issue/_form'); ?>
<p>
	<?php echo Html::anchor('issue/view/'.$issue->id, 'View'); ?> |
	<?php echo Html::anchor('issue', 'Back'); ?></p>
