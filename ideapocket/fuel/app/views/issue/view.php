<?php if ($issue): ?>
<div class="issue">
<h2><?php echo $issue->title; ?></h2>
<p><?php echo $issue->description; ?></p>
<p>by <?php echo $issue->user; ?> - <a href="#">Like(<?php echo count($issue->likes); ?>)</a> - <?php 
          echo Html::anchor('issue/view/'.$issue->id, 'Solution('.count($issue->solutions).')'); 
          //when this isuee is owned by user, it show 'edit' and 'delete' link.
          if($issue->user=='kyagi'): 
		         echo ' - '.Html::anchor('issue/edit/'.$issue->id, 'Edit'); 
             echo ' - '.Html::anchor('issue/delete/'.$issue->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); 
          endif;
      ?></p>

<form class="well">
    <input type="text" placeholder="Solution" class="span8"><br>
    <textarea placeholder="Description" class="span8"></textarea><br>
    <button class="btn" type="submit">Submit</button>
</form>


<dl class="solution">
<?php foreach ($issue->solutions as $solution): ?>
    <dt><?php echo $solution->title; ?><?php echo $solution->description; ?></dt>
    <dd class="info">by <?php echo $solution->user; ?> - <a href="#">Like(<?php echo count($solution->likes); ?>)</a> - <?php   
		      echo Html::anchor('solution/view/'.$issue->id, 'See more'); 
          if($issue->user=='kyagi'): 
             //when this solution is owned by user, it show 'edit' and 'delete' link.
		         echo ' - '.Html::anchor('solution/edit/'.$solution->id, 'Edit'); 
             echo ' - '.Html::anchor('solution/delete/'.$solution->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); 
          endif;
               ?></p>
<?php endforeach; ?>
</dl>
</div>

<?php else: ?>
<p>No Issues.</p>

<?php endif; ?>
