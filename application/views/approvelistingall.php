<div class="approve_listing">
<?php
foreach($allinfo as $perinfo){
	echo '<div>';
	echo 'Bpid:'.$perinfo['bpid'].' , Babershop name: '.$perinfo['babershopname'];
	
	if($perinfo['isapproved'] == 1){
		$statusapprove = 'Yes';
	}else{
		$statusapprove = 'Waiting';
	}
	echo ' | Approve status:'.$statusapprove;
	echo '</div>';
}
?>
</div>