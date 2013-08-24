<?php echo '<div class="container">';?>
<?php echo '<div class="span7 well offset2 text-center">';?>
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
    <div class="span5" style="padding-left: 50px;">
    <textarea name='comment' class="form-control span4"></textarea></div>
    <div class="span5 text-center" style="margin-top: 20px;padding-left: 50px;"><input type="submit" value="Submit" name="submit" class="btn btn-primary"></div>
<?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>
