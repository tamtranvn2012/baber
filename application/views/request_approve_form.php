<?php echo form_open_multipart('/profilepage/saverequest', array('id' => 'request_approve')); ?>
	<p>Choose your profile</p>
	<select name="yourbpprofile">
		<?php
			foreach ($bpownchoice as $key => $value) {
				echo '<option value="'.$key.'">'.$value.'</option>';
			}	
		?>
	</select> 	
	<p>Choose your bussiness username</p>
	<input type="text" name="bussinessprofileid" />
	<input type="submit" value="Submit" />
<?php echo form_close(); ?>