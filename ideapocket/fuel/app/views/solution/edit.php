<h2>Editing Solution</h2>
<br>

<?php echo render('solution/_form'); ?>
<p>
	<?php echo Html::anchor('solution/view/'.$solution->id, 'View'); ?> |
	<?php echo Html::anchor('solution', 'Back'); ?></p>
