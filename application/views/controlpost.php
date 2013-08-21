<div class="container">
<?php
    echo '<div class="span7 offset2 well text-center" style="line-height:30px;">';
    echo '<ul>';
	$makeposturl =  base_url($username.'/manage/biposts');
	echo '<li><a href="'.$makeposturl.'">Make new Post on Your profile </a></li>';
	$makeposturl =  base_url($username.'/manage/posts/'.$upid.'/'.$upid);
	echo '<li><a href="'.$makeposturl.'">Manage Posts on Your Profile</a></li>';
	foreach($apidsobjs as $perapidobj){	   
		$upid = $perapidobj['upid'];
		$bpid = $perapidobj['bpid'];
		$makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
		echo '<li><a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></li>';
		$makeposturl =  base_url($username.'/manage/posts/'.$upid.'/'.$bpid);
		echo '<li><a href="'.$makeposturl.'">Manage Posts on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></li>';
	}
    echo '</ul>';
    echo '</div>';
  
?>
</div>