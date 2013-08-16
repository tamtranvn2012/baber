<?php echo form_open_multipart('/'.$username.'/manage/saverequest', array('id' => 'request_approve')); ?>
<div class="span5 offset3">
            	<h3>Choose your invidual profile</h3>
	<select name="yourbpprofile" class="span3">
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

</div>
<?php echo form_close(); ?>
