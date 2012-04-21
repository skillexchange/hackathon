<h2>Viewing #<?php echo $comment->id; ?></h2>

<p>
	<strong>Description:</strong>
	<?php echo $comment->description; ?></p>
<p>
	<strong>User:</strong>
	<?php echo $comment->user; ?></p>
<p>
	<strong>Deleted:</strong>
	<?php echo $comment->deleted; ?></p>
<p>
	<strong>Likes:</strong>
	<?php echo $comment->likes; ?></p>

<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
<?php echo Html::anchor('comment', 'Back'); ?>