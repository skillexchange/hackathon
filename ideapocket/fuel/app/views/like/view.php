<h2>Viewing #<?php echo $like->id; ?></h2>

<p>
	<strong>Issue id:</strong>
	<?php echo $like->issue_id; ?></p>
<p>
	<strong>Solution id:</strong>
	<?php echo $like->solution_id; ?></p>
<p>
	<strong>User:</strong>
	<?php echo $like->user; ?></p>
<p>
	<strong>Deleted:</strong>
	<?php echo $like->deleted; ?></p>

<?php echo Html::anchor('like/edit/'.$like->id, 'Edit'); ?> |
<?php echo Html::anchor('like', 'Back'); ?>