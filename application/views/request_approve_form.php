<?php echo form_open_multipart('/'.$username.'/manage/saverequest', array('id' => 'request_approve')); ?>
	<p>Choose your invidual profile</p>
	<select name="yourbpprofile">
		<?php
			foreach ($bpownchoice as $key => $value) {
				echo '<option value="'.$key.'">'.$value.'</option>';
			}	
		?>
	</select> 	
	<p>Choose your bussiness id </p>
	<input type="text" name="bussinessprofileid" />
	<input type="submit" value="Submit" />
	<?php 
		foreach($userbpids as $perbpid){
			echo '<p>Username:'.$perbpid['username'].' bussiness id:'.$perbpid['bpid'].'</p>';
		}
	?>
<?php echo form_close(); ?>
