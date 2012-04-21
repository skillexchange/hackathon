<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($comment) ? $comment->description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User', 'user'); ?>

			<div class="input">
				<?php echo Form::input('user', Input::post('user', isset($comment) ? $comment->user : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Deleted', 'deleted'); ?>

			<div class="input">
				<?php echo Form::input('deleted', Input::post('deleted', isset($comment) ? $comment->deleted : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Likes', 'likes'); ?>

			<div class="input">
				<?php echo Form::input('likes', Input::post('likes', isset($comment) ? $comment->likes : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>