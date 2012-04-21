<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Issue id', 'issue_id'); ?>

			<div class="input">
				<?php echo Form::input('issue_id', Input::post('issue_id', isset($like) ? $like->issue_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Solution id', 'solution_id'); ?>

			<div class="input">
				<?php echo Form::input('solution_id', Input::post('solution_id', isset($like) ? $like->solution_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User', 'user'); ?>

			<div class="input">
				<?php echo Form::input('user', Input::post('user', isset($like) ? $like->user : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Deleted', 'deleted'); ?>

			<div class="input">
				<?php echo Form::input('deleted', Input::post('deleted', isset($like) ? $like->deleted : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>