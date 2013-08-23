<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 10:18 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
$username = $this->uri->segment(1, 0);
echo form_open_multipart('/'.$username.'/manage/postuserprofile', array('id' => 'fileupload')); ?>
<h3>Post your idea here</h3>
<textarea name='comment' rows='4' cols='50'></textarea><br>
    <input type="submit" value="Submit" name="submit">
<?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>
