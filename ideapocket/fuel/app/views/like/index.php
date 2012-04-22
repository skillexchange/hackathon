<h2>Listing Likes</h2>
<br>
<?php if ($likes): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Issue id</th>
			<th>Solution id</th>
			<th>User</th>
			<th>Deleted</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($likes as $like): ?>		<tr>

			<td><?php echo $like->issue_id; ?></td>
			<td><?php echo $like->solution_id; ?></td>
			<td><?php echo $like->user; ?></td>
			<td><?php echo $like->deleted; ?></td>
			<td>
				<?php echo Html::anchor('like/view/'.$like->id, 'View'); ?> |
				<?php echo Html::anchor('like/edit/'.$like->id, 'Edit'); ?> |
				<?php echo Html::anchor('like/delete/'.$like->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Likes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('like/create', 'Add new Like', array('class' => 'btn success')); ?>
	<?php echo Html::anchor('like/add', 'Add new Like-api', array('class' => 'btn success')); ?>

</p>
