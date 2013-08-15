<?php 
	foreach($bpidsmanage as $perbpidinfo){
		$approveurl =  base_url($username.'/manage/listapprove/'.$perbpidinfo['bpid']);
		echo '<p><a href="'.$approveurl.'">Manage approve of profile id='.$perbpidinfo['bpid'].',Babershopname: '.$perbpidinfo['babershopname'].'</a></p>';
	}
?>
