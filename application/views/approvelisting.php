<div class="container">
<div class="row">
<!--begin slider-->
	<div class="span4 well">      
		Left Sidebar Here
	</div>
                <!--end slider-->
<div class="span8 well" style="margin-left: 10px;">
<?php
//var_dump($listapproved);
echo '<div class="span3" style="padding-left:20px;">';
echo '<h3>List Approved profile</h3>';
if($listapproved){
	foreach($listapproved as $perapproved){
	   echo '<ul>';
       echo '<li>';
		echo 'Profile Id : '.$perapproved->upid.'</br>';
         echo '</li>';
         echo '<li>';
		echo 'Approve Profile Id : '.$perapproved->apid.'</br>';
        echo '</li>';
        echo '</ul>';
	?>
		<a href="<?php echo base_url().$username;?>/manage/unapproveapid/<?php echo $perapproved->bpid;?>/<?php echo $perapproved->apid;?>">UnApprove This profile</a>
	<?php
	}
}
echo '</div>';
?>


<?php
echo '<div class="span3 offset1" style="padding-left:20px;">';
echo '<h3>List UnApproved profile</h3>';
if($listunapproved){
	foreach($listunapproved as $perunapproved){
		echo 'Profile Id : '.$perunapproved->upid.'</br>';
		echo 'Approve Profile Id : '.$perunapproved->apid.'</br>';
	?>
		<a href="<?php echo base_url().$username;?>/manage/approveapid/<?php echo $perunapproved->bpid;?>/<?php echo $perunapproved->apid;?>">Approve This profile</a>
	<?php
	}
}
echo '</div>';
?>
</div>
</div>
</div>
