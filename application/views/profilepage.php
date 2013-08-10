<?php
	$divsep = 1;
	foreach($postresults as $perpost){
		if($divsep == 1){
			echo '<div id="1">';
		}
		if(($divsep > 2) && ($divsep%4==1)){
			$divindex = intval($divsep/4)+1;
			echo '<div id="'.$divindex.'">';
		}
		echo $perpost->babershopname.'--';
		if(($divsep > 2) && ($divsep%4==0)){
			echo '</div>';
		}		
		$divsep++;
	};
	$divsep -= 1;
	if ($divsep%4 > 0){
		echo '</div>';
	}
?>