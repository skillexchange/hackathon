            <div class="rank">
              <h3>人気の課題</h3>
                <ol>
                    <?php $i=0; ?>
                    <?php foreach ($issues as $issue): ?>
                    <li>
                       <?php echo Html::anchor('issue/view/'.$issue->id, $issue->title); ?>
                       <span class="count-mini">★ <?php echo $issue->liked; ?></span> 
                    </li>
                    <?php if ($i>4): break; endif ?>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </ol>
            </div>
  
            <div class="rank">
                <h3>人気の解決方法</h3>
                    <ol>
                    <?php foreach ($solutions as $solution): ?>
                    <li>
                       <?php echo Html::anchor('issue/view/'.$solution->issue_id, $solution->title); ?>
                       <span class="count-mini">★ <?php echo $solution->liked; ?></span> 
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
