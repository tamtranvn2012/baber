<div class="container">
<?php 
    echo '<div class="span7 offset2 well text-center">';
    echo '<ul>';
	foreach($bpidsmanage as $perbpidinfo){
		$approveurl =  base_url($username.'/manage/listapprove/'.$perbpidinfo['bpid']);
        
        echo '<li>';
	   	echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidinfo['bpid'].',Babershopname: '.$perbpidinfo['babershopname'].'</a>';
        echo '</li>';
        
	}
    echo '</ul>';
    echo '</div>';
?>
</div>
