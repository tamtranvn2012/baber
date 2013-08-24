<div class="container">
<?php
 echo '<div class="row well">';
foreach($allinfo as $perinfo){
    echo '<ul class="span3">';
	echo '<li>'.'Bpid:'.$perinfo['bpid'];
    echo '<li>'. 'Babershop name:'.$perinfo['babershopname'].'</li>';
	
	if($perinfo['isapproved'] == 1){
		$statusapprove = 'Yes';
	}else{
		$statusapprove = 'Waiting';
	}
	echo '<li>'.'Approve status:'.$statusapprove.'</li>';
    echo '</ul>';
}
    
echo '</div>';
?>
</div>