<div class="container">
<div class="row">
<!--begin slider-->
                    <div class="span4 well">
                         <?php echo '<ul>';?>
                            <?php echo '<li class="list"style=" margin-top:20px;" >';?>
                            <a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>
                            
                            <?php echo '</li>';?>
                            
                            <?php
                            foreach($bpidsmanage as $perbpidobj){
                                $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a>';
                                 echo '</li>';
                            }
                            
                            ?>
                            
                            <?php
                            
                            foreach($apidsobjs as $perapidobj){
                                $upid = $perapidobj->upid;
                                $bpid = $perapidobj->bpid;
                                $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a>';
                                 echo '</li>';
                            }
                            ?>
                            <?php echo '<li class=" list">';?>
                            <a href="<?php echo base_url($username.'/manage/addbussinessprofile');?>">Add New Bussiness Profile</a>
                            <?php echo '</li>';?>
                            
                            <?php echo '<li class="  list">';?>
                            <a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Profile</a>
                            <?php echo '</li>';?>
                            <?php echo '</ul>';?>
                                
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
