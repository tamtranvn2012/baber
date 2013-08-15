<div>
	<?php
		foreach($allinfoposts as $perpostinfo){
			$deleteposturl = '/'.$username.'/manage/posts/delete/'.$perpostinfo->ppid;
			$deletepost = '<a href="'.base_url($deleteposturl).'">Delete this post</a>';
			echo '<div class="postinfo" style="float:left;padding-right:20px;padding-bottom:20px;">';
			echo '<div class="postinfo-babershopname">Babershop name:'.$perpostinfo->babershopname.'</div>';
			echo '<div class="postinfo-photo">Photo id:'.$perpostinfo->photo_id.'</div>';
			echo '<div class="postinfo-babertype">Baber type:'.$perpostinfo->baber_type.'</div>';
			echo '<div class="postinfo-delete">'.$deletepost.'</div>';
			echo '</div>';
		}
	?>
</div>
testt