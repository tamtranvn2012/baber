<?php 
	foreach($bpidsmanage as $perbpidobj){
		$approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
		echo '<p><a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a></p>';
	}
?>
