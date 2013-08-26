<div class="container">
<?php
 echo '<div class="row well">';
if($allinfo){
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
}else{
	echo "You Don't have any approve record to other bussiness profile";
}
echo '</div>';
?>
</div>