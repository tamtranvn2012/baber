<?php
	foreach($apidsobjs as $perapidobj){
		$upid = $perapidobj['upid'];
		$bpid = $perapidobj['bpid'];
		$makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
		echo '<p><a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></p>';
		$makeposturl =  base_url($username.'/manage/posts/'.$upid.'/'.$bpid);
		echo '<p><a href="'.$makeposturl.'">Manage Posts on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></p>';
	}
?>