<h2>Viewing #<?php echo $solution->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $solution->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $solution->description; ?></p>
<p>
	<strong>User:</strong>
	<?php echo $solution->user; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $solution->url; ?></p>
<p>
	<strong>Issue id:</strong>
	<?php echo $solution->issue_id; ?></p>
<p>
	<strong>Deleted:</strong>
	<?php echo $solution->deleted; ?></p>
<p>
	<strong>Likes:</strong>
	<?php echo $solution->likes; ?></p>

<?php echo Html::anchor('solution/edit/'.$solution->id, 'Edit'); ?> |
<?php echo Html::anchor('solution', 'Back'); ?>