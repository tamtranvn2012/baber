<div class="container">
<?php
    echo '<div class="span7 offset2 well text-center" style="line-height:30px;">';
    echo '<ul>';
	if($apidsobjs){
		foreach($apidsobjs as $perapidobj){	   
			$upid = $perapidobj['upid'];
			$bpid = $perapidobj['bpid'];
			$makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
			echo '<li><a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></li>';
			$makeposturl =  base_url($username.'/manage/posts/'.$upid.'/'.$bpid);
			echo '<li><a href="'.$makeposturl.'">Manage Posts on Bussiness profile Id='.$bpid.',Babershopname: '.$perapidobj['babershopname'].'</a></li>';
		}
	}else{
		echo "You don't have any post on other bussiness profile";
	}
    echo '</ul>';
    echo '</div>';
  
?>
</div>