<div>
	<?php
		foreach($apidsobjs as $perapidobj){
			$upid = $perapidobj->upid;
			$bpid = $perapidobj->bpid;
			$makeposturl =  base_url($username.'/manage/posts/'.$upid.'/'.$bpid);
			echo '<p><a href="'.$makeposturl.'">Manage Posts on Bussiness profile Id='.$bpid.'</a></p>';
		}
	?>
</div>