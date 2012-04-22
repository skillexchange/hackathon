<?php echo  '{"type":"'.$title.'",'; ?>
<?php if (Session::get_flash('success')): ?>
          <?php echo  '"message":"ok"}'; ?>
<?php else :?>
					<?php echo '"message":"ng"}'; ?>
<?php endif; ?>
