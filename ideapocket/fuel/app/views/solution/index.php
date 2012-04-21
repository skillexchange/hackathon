<h2>Listing Solutions</h2>
<br>
<?php if ($solutions): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>User</th>
			<th>Url</th>
			<th>Issue id</th>
			<th>Deleted</th>
			<th>Liked</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($solutions as $solution): ?>		<tr>

			<td><?php echo $solution->title; ?></td>
			<td><?php echo $solution->description; ?></td>
			<td><?php echo $solution->user; ?></td>
			<td><?php echo $solution->url; ?></td>
			<td><?php echo $solution->issue_id; ?></td>
			<td><?php echo $solution->deleted; ?></td>
			<td><?php echo $solution->liked; ?></td>
			<td>
				<?php echo Html::anchor('solution/view/'.$solution->id, 'View'); ?> |
				<?php echo Html::anchor('solution/edit/'.$solution->id, 'Edit'); ?> |
				<?php echo Html::anchor('solution/delete/'.$solution->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Solutions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('solution/create', 'Add new Solution', array('class' => 'btn success')); ?>

</p>
