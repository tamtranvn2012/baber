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
    <?php echo form_open_multipart('/'.$username.'/manage/saverequest', array('id' => 'request_approve')); ?>
<div class="span8  well" style="text-align:center; margin-left: 10px;">
    <h3>Choose your invidual profile</h3>
	<div class="span6" style="text-align: center;">
        <select name="yourbpprofile" class="form-control">
		<?php
			foreach ($bpownchoice as $key => $value) {
				echo '<option value="'.$key.'">'.$value.'</option>';
			}	
		?>
	</select> 
    </div>
    <br />
	<h3>Choose your bussiness id </h3>
	<div class="span6">
        <input type="text" name="bussinessprofileid" class=" has-warning form-control" />
	   <input type="submit" name="submit"  value="Add" class=" btn btn-primary" id="register" style="margin-top: 20px;" />
    
    </div>
		
		 
	<div class="span6" style="margin-top: 20px;">
        	<?php 
			echo '<ul>';
			foreach($userbpids as $perbpid){
				
				echo '<li>Username:'.$perbpid['username'].' bussiness id:'.$perbpid['bpid'].'</li>';
				
			}
			echo '</ul>';
		?>

    
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
