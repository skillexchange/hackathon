{
"title":"<?php echo $title;?>","type":"<?php echo $type;?>","users":"<?php 

$users=array();
foreach ($likes as $like):
    array_push($users, $like->user);
endforeach; 

echo implode(',', $users);

?>"}

