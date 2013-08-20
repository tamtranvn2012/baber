<div class="container">

<?php
 echo '<div class="span7 offset2 well text-center" style="line-height:30px;">';
foreach($allinfo as $perinfo){

	echo 'Bpid:'.$perinfo['bpid'].' , Babershop name: '.$perinfo['babershopname'];
	
	if($perinfo['isapproved'] == 1){
		$statusapprove = 'Yes';
	}else{
		$statusapprove = 'Waiting';
	}
	echo ' | Approve status:'.$statusapprove;
}
echo '</div>';
?>
</div>