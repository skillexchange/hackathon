<div id="issue-form">
    <h2>解決するべき課題</h2>
    <p>あなたが解決するべきだと思う<strong>課題</strong>を投稿してください。</p>

<?php echo Form::open(array('class' => 'well')); ?>
    <?php echo Form::input('タイトル', Input::post('title', isset($issue) ? $issue->title : ''), array('class' => 'span4')); ?>
    <?php echo Form::textarea('description', Input::post('description', isset($issue) ? $issue->description : ''), array('class' => 'span10', 'rows' => 11)); ?>
    <?php echo Form::hidden('user', Input::post('user', isset($issue) ? $issue->user : '')); ?>
    <div class="clearfix">
      <?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>
    </div>
  </fieldset>
<?php echo Form::close(); ?>

</div>