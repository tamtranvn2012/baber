<div class="container">
<div class="row">
<?php echo form_open_multipart('/'.$username.'/manage/saverequest', array('id' => 'request_approve')); ?>
	<div class="span4 well">
		Left SideBar here
	</div>
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
