<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($solution) ? $solution->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($solution) ? $solution->description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Url', 'url'); ?>

			<div class="input">
				<?php echo Form::input('url', Input::post('url', isset($solution) ? $solution->url : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label($solution->user, 'User'); ?>
		  <?php echo Form::hidden('user', Input::post('user', isset($solution) ? $solution->user : '')); ?>

		</div>
		    <?php echo Form::hidden('liked', Input::post('liked', isset($solution) ? $solution->liked : '')); ?>
		    <?php echo Form::hidden('deleted', Input::post('deleted', isset($solution) ? $solution->deleted : '')); ?>
		    <?php echo Form::hidden('issue_id', Input::post('issue_id', isset($solution) ? $solution->issue_id : '')); ?>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
