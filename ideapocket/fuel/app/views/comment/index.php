<h2>Listing Comments</h2>
<br>
<?php if ($comments): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Description</th>
			<th>User</th>
			<th>Deleted</th>
			<th>Likes</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $comment): ?>		<tr>

			<td><?php echo $comment->description; ?></td>
			<td><?php echo $comment->user; ?></td>
			<td><?php echo $comment->deleted; ?></td>
			<td><?php echo $comment->likes; ?></td>
			<td>
				<?php echo Html::anchor('comment/view/'.$comment->id, 'View'); ?> |
				<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
				<?php echo Html::anchor('comment/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('comment/create', 'Add new Comment', array('class' => 'btn success')); ?>

</p>
