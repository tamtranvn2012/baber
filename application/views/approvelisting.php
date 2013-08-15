<h3>List Approved profile</h3>
<?php
//var_dump($listapproved);
echo '</br>';

if($listapproved){
	foreach($listapproved as $perapproved){
		echo 'Profile Id : '.$perapproved->upid.'</br>';
		echo 'Approve Profile Id : '.$perapproved->apid.'</br>';
	?>
		<a href="<?php echo base_url().$username;?>/manage/unapproveapid/<?php echo $perapproved->bpid;?>/<?php echo $perapproved->apid;?>">UnApprove This profile</a>
	<?php
	}
}
?>
<br/>
<h3>List UnApproved profile</h3>
<?php
echo '</br>';
if($listunapproved){
	foreach($listunapproved as $perunapproved){
		echo 'Profile Id : '.$perunapproved->upid.'</br>';
		echo 'Approve Profile Id : '.$perunapproved->apid.'</br>';
	?>
		<a href="<?php echo base_url().$username;?>/manage/approveapid/<?php echo $perunapproved->bpid;?>/<?php echo $perunapproved->apid;?>">Approve This profile</a>
	<?php
	}
}
?>